# website-3.0-docker
All configuration and deployment scripts needed to automate the deployment of my website via Docker.

## How to deploy

TODO: Write more thorough instructions.

1. Install Node, Docker, and git on the server
2. Clone this repository on the server
3. Run `npm install` inside this repository
4. Run `docker-compose up` inside this repository

## Developing

Some useful commands:

To run the Docker network locally, run at the root of this repository:

`docker-compose -f .\docker-compose.yml -f .\docker-compose.dev.yml up --build`

This will run the Docker network with some development options enabled.

To remove take down the network and delete the data volume:

`docker-compose down; docker volume rm website-30-docker_inspirograph-mysql-volume`

## TODO

- All static content
- Rook
- Rookkeeper
- Battleship
- ldraw-visualizer
- Node chat
- Deck of Cards
- Portfolio?
- Speller?

- MySQL user is currenty defined on '%' - defining the user as 'php' didn't work.  Investigate?
   - Now it is defined as 'inspirograph-php-container.%', which is better, but still not what I want.
