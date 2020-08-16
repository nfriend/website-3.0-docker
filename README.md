# website-3.0-docker

<a href="https://gitlab.com/nfriend/website-3.0-docker/pipelines/latest"
  target="_blank"><img
  src="https://gitlab.com/nfriend/website-3.0-docker/badges/master/pipeline.svg"
  alt="GitLab build status"></a>

All configuration and deployment scripts needed to automate the deployment of
[my website](https://nathanfriend.io/) via [Docker](https://www.docker.com/).

[View the source on GitLab.](https://gitlab.com/nfriend/website-3.0-docker)

## How to deploy to a new server

1. If you haven't already, update the DNS entries of all
   `*.nathanfriend.(io|com)` domains to the server's new IP address.
1. Open up the following (inbound) ports in the VM:

   - 80 (HTTP)
   - 443 (HTTPS)
   - 685 (SSH)
   - 18734 (Roggle websocket server)
   - 9300 (Rook websocket server)
   - 8089 (NodeChat websocket server)

1. Install Node, Docker, Docker Compose, and git on the server
1. Create a new user on the server named `gitlabci`
1. Allow the `gitlabci` user to run Docker commands without `sudo`:
   https://docs.docker.com/engine/install/linux-postinstall/#manage-docker-as-a-non-root-user
1. Give the user SSH access and update this project's CI/CD variables with the
   updated values (see the [**Variables**](#variables) section below),
   specifically:
   - `SSH_PRIVATE_KEY`
   - `SSH_PORT`
   - `SSH_KNOWN_HOSTS`
     - This documentation page explains how to generate this value:
       https://docs.gitlab.com/ee/ci/ssh_keys/#verifying-the-ssh-host-keys
1. Run this project's pipeline

At this point in time, the pipeline _should_ automatically deploy the
application to [nathanfriend.io](https://nathanfriend.io). Although I'm almost
positive I've forgotten a few steps, so good luck 😅

However, visiting https://nathanfriend.io will result in a certificate error.
This is because during its first deployment, nginx uses some
[fake](./nginx/deployed/temp.cert.pem)
[certificates](./nginx/deployed/temp.key.pem) in order to start the server
before real certificates are fetched from [Let's
Encrypt](https://letsencrypt.org/) (using the [Certbot Docker
container](https://certbot.eff.org/docs/install.html#running-with-docker)).

To fetch real certificates, SSH into the server and run
[`scripts/init-lets-encrypt.template.sh`](./scripts/init-lets-encrypt.template.sh).
This script will request certificats from Let's Encrypt, save the certificats to
the server, and reload nginx. After this script finishes successfully, you
should no longer receive a certificate error when browsing to
https://nathanfriend.io.

**Note:** This script only needs to be run **once**. Subsequent deploys will
reuse these certificates, and renewals are handled automatically. Also, this
script must be run while the Docker services are up and running.

### Variables

In order for this project's GitLab pipeline to succeed, a few environment
variables are required:

| Variable name          | Description                                                                                                                                                                                                                                      |
| ---------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| SERVER_ADDR            | Main domain of the site, without subdomains or protocol. Should be set to `nathanfriend.io` unless the site is moved somewhere else in the future.                                                                                               |
| SERVER_USER            | Username of the server user used by the GitLab pipeline to SSH into the server and execute deployments. This project assumes this user is `gitlabci`.                                                                                            |
| SSH_PRIVATE_KEY        | The SSH private key that `SERVER_USER` can use to SSH into the server                                                                                                                                                                            |
| SSH_PORT               | The port used by `SERVER_USER` when SSH'ing                                                                                                                                                                                                      |
| SSH_KNOWN_HOSTS        | See https://docs.gitlab.com/ee/ci/ssh_keys/#verifying-the-ssh-host-keys                                                                                                                                                                          |
| REGENERATE_SKILL_JSONS | Optional. If provided, regenerates and deploys the JSON files that support the Alexa flash briefing skills (and does _not_ perform the normal deploy to https://nathanfriend.io). See the [**Flash briefings**](#flash-briefings) section below. |

### Migrating stateful app data

Most of the apps that run on this webserver are stateless and don't require any
data migration. However, there a few exceptions. Here are instructions on how to
move these apps with their data:

#### Inspirograph

Here's the high-level idea:

- Export the current database as a `.sql` file from the old MySQL container on
  the old server
- Copy the file into the new MySQL on the new server
- Import the file into the new MySQL database

Inspirograph consists of one MySQL database with one (very large) table. To
export the data from the old server, SSH into the MySQL container using:

```bash
docker exec -it <container-id> bash
```

Then, inside the MySQL container, run the following:

```bash
mysqldump -u root -p <root password here> inspirograph > inspirograph-backup.sql
```

Then, exit the container SSH session and copy the file from the container to the
host using:

```bash
docker cp <container-id>:/path/to/inspirograph-backup.sql
```

Copy `inspirograph-backup.sql` to the new server. Then, SSH into the new host
machine and copy the file into the new MySQL container:

```bash
docker cp /path/to/inspirograph-backup.sql <container-id>:/inspirograph-backup.sql
```

Look at the logs of the MySQL container to get the MySQL `root` password:

```bash
docker logs <container-id>
```

The line in the logs output will look like this:

```bash
GENERATED ROOT PASSWORD: <password here>
```

Alternatively, the password can be found in KeePass.

Copy `inspirograph-backup.sql` into the new MySQL container:

```bash
docker cp inspirograph-backup.sql <container-id>:/tmp/inspirograph-backup.sql
```

Import the `.sql` into the new MySQL container by SSH'ing into the container (as
described above), dropping the DEV version of the database (created when the
container is created), and recreating the database:

```bash
mysql -u root -p

mysql> DROP DATABASE inspirograph;
mysql> CREATE DATABASE inspirograph;
```

Then, import the `.sql` file:

```bash
mysql -u root -p inspirograph < inspirograph-backup.sql
```

### Flash briefings

In order to support the [Fortune
Cookie](https://www.amazon.ca/Nathan-Friend-Fortune-Cookie/dp/B07DMYQPTS) and
[Oddly Specific Fortunes](https://www.amazon.com/gp/product/B07DNTS3MP) Alexa
flash briefings, the JSON files hosted at
https://nathanfriend.io/flash-briefings/fortune-cookie.json and
https://nathanfriend.io/flash-briefings/oddly-specific-fortunes.json are
regenerated each day (at 3:00 AM Eastern time). This is done through a scheduled
pipeline in this project with the `REGENERATE_SKILL_JSONS` environment variable
set to `true`.

### Things to test after a deployment

- That you can reach the static site
- That the SSL certificate is valid and working
- That Inspirograph can submit files to and retrieve files from the gallery
- That WebSocket connections can be established for Rook, NodeChat, and Roggle
- That the flash briefing `.json` files have been updated
  - https://nathanfriend.io/flash-briefings/fortune-cookie.json
  - https://nathanfriend.io/flash-briefings/oddly-specific-fortunes.json

Most of these tests are now automated after each deploy through a downstream
pipeline in the
[`website-3.0-tests`](https://gitlab.com/nfriend/website-3.0-tests/) project.

## Notes to self on developing

All new development should use npm to host the build artifacts of the
application. Some older applications have been copied verbatim into this
reposistory into the `static` directory, since this is easier than updating them
to include a `package.json` as part of their build. The assumption is that no
new development will occur on these repositories.

### DNS

During development, you will need to update your `hosts` file
(`C:\Windows\System32\drivers\etc\hosts` or `/etc/hosts`) with the following
entries:

```
127.0.0.1   nathanfriend.io
127.0.0.1   nathanfriend.com
127.0.0.1   www.nathanfriend.io
127.0.0.1   www.nathanfriend.com
127.0.0.1   dev.nathanfriend.io
127.0.0.1   dev.nathanfriend.com
127.0.0.1   www.dev.nathanfriend.io
127.0.0.1   www.dev.nathanfriend.com
127.0.0.1   fake.nathanfriend.io
127.0.0.1   fake.nathanfriend.com
127.0.0.1   bethany.and.nathanfriend.com
127.0.0.1   www.bethany.and.nathanfriend.com
127.0.0.1   bethany.and.nathanfriend.io
127.0.0.1   www.bethany.and.nathanfriend.io
```

### Some useful commands:

To run the Docker network locally, run at the root of this repository:

`docker-compose up -d --build`

To take down the network and delete the Inspirograph data volume:

`docker-compose down; docker volume rm website-30-docker_inspirograph-mysql-volume`

## TODO

Add the following projects:

- ldraw-visualizer
- Deck of Cards
