FROM node:8.11.4-alpine

EXPOSE 8089

WORKDIR /usr/src/nodechat

COPY ./static/NodeChat .

RUN npm install websocket@1.0.10

CMD node server/ws-server.js