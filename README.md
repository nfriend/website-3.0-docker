# website-3.0-docker
All configuration and deployment scripts needed to automate the deployment of my website via Docker.

## How to deploy

1. If you haven't already, update the DNS entries of all `*.nathanfriend.(io|com)` domains to the server's new IP address.  This is necessary because the server will attempt to fetch new certificates from Let's Encrypt during startup.
1. Install Node, Docker, Docker Compose, and git on the server
2. Clone this repository on the server: `git clone https://github.com/nfriend/website-3.0-docker.git`
3. Run `npm install` inside this repository
4. Run `docker-compose up -d --build` inside this repository

## Notes to self on developing

All new development should use npm to host the build artifacts of the application.  Some older applications have been copied verbatim into this reposistory into the `static` directory, since this is easier than updating them to include a `package.json` as part of their build.  The assumption is that no new development will occur on these repositories.

### DNS

During development, you will need to update your `hosts` file (`C:\Windows\System32\drivers\etc\hosts`) with the following entries:

```
127.0.0.1		nathanfriend.io
127.0.0.1		nathanfriend.com
127.0.0.1		www.nathanfriend.io
127.0.0.1		www.nathanfriend.com
127.0.0.1		dev.nathanfriend.io
127.0.0.1		dev.nathanfriend.com
127.0.0.1		www.dev.nathanfriend.io
127.0.0.1		www.dev.nathanfriend.com
127.0.0.1		fake.nathanfriend.io
127.0.0.1		fake.nathanfriend.com
127.0.0.1		bethany.and.nathanfriend.com
127.0.0.1		www.bethany.and.nathanfriend.com
127.0.0.1		bethany.and.nathanfriend.io
127.0.0.1		www.bethany.and.nathanfriend.io
```

### Some useful commands:

To run the Docker network locally, run at the root of this repository:

`docker-compose -f .\docker-compose.yml -f .\docker-compose.dev.yml up -d --build`

This will run the Docker network with some development options enabled.  Although in most cases, it suffices to run the normal command, `docker-compose up -d --build`.

To take down the network and delete the data volume:

`docker-compose down; docker volume rm website-30-docker_inspirograph-mysql-volume`

## TODO

Add the following projects:

- ldraw-visualizer
- Deck of Cards

The last time I took the server down and back up, `nginx` didn't start - it complained about not being able to access the existing certs.  I had to delete the named volume that stores the certs in order to get `nginx` to start.  Not sure if this was a one-time thing or if there's a problem with how I'm specifying the volume that `nginx` uses to store its certs.  Don't make this mistake too much - Let's Encrypt has [rate limits](https://letsencrypt.org/docs/rate-limits/) that you'll hit if you try this too many times in a short period of time.
