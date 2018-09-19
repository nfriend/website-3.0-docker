# website-3.0-docker
All configuration and deployment scripts needed to automate the deployment of my website via Docker.

## How to deploy

1. Install Node, Docker, and git on the server
2. Clone this repository on the server
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

To remove take down the network and delete the data volume:

`docker-compose down; docker volume rm website-30-docker_inspirograph-mysql-volume`

## TODO

- ldraw-visualizer
- Deck of Cards
