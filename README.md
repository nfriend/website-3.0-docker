# website-3.0-docker

All configuration and deployment scripts needed to automate the deployment of my
website via Docker.

## How to deploy

1. If you haven't already, update the DNS entries of all
   `*.nathanfriend.(io|com)` domains to the server's new IP address. This is
   necessary because the server will attempt to fetch new certificates from
   Let's Encrypt during startup.
1. Open up the following (inbound) ports in the VM:

- 80 (HTTP)
- 443 (HTTPS)
- 685 (SSH)
- 18734 (Roggle websocket server)
- 9300 (Rook websocket server)
- 8089 (NodeChat websocket server)

1. Install Node, Docker, Docker Compose, and git on the server
2. Clone this repository on the server: `git clone https://github.com/nfriend/website-3.0-docker.git`
3. Run `npm install` inside this repository
4. Run `docker-compose up -d --build` inside this repository

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

### Things to test after a deployment

- That you can reach the static site
- That the SSL certificate is valid and working
- That Inspirograph can submit files to and retrieve files from the gallery
- That WebSocket connections can be established for Rook, NodeChat, and Roggle
- That the flash briefing `.json` files have been updated
  - https://nathanfriend.io/flash-briefings/fortune-cookie.json
  - https://nathanfriend.io/flash-briefings/oddly-specific-fortunes.json

## Notes to self on developing

All new development should use npm to host the build artifacts of the
application. Some older applications have been copied verbatim into this
reposistory into the `static` directory, since this is easier than updating them
to include a `package.json` as part of their build. The assumption is that no
new development will occur on these repositories.

### DNS

During development, you will need to update your `hosts` file
(`C:\Windows\System32\drivers\etc\hosts`) with the following entries:

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

`docker-compose -f .\docker-compose.yml -f .\docker-compose.dev.yml up -d --build`

This will run the Docker network with some development options enabled. Although
in most cases, it suffices to run the normal command, `docker-compose up -d --build`.

To take down the network and delete the data volume:

`docker-compose down; docker volume rm website-30-docker_inspirograph-mysql-volume`

## TODO

Add the following projects:

- ldraw-visualizer
- Deck of Cards

The last time I took the server down and back up, `nginx` didn't start - it
complained about not being able to access the existing certs. I had to delete
the named volume that stores the certs in order to get `nginx` to start. Not
sure if this was a one-time thing or if there's a problem with how I'm
specifying the volume that `nginx` uses to store its certs. Don't make this
mistake too much - Let's Encrypt has [rate
limits](https://letsencrypt.org/docs/rate-limits/) that you'll hit if you try
this too many times in a short period of time.
