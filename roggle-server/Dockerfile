FROM node:8.11.4-alpine

EXPOSE 18734

WORKDIR /usr/src/roggle

COPY ./node_modules/@nathanfriend/roggle/package.json .

RUN npm install

COPY ./node_modules/@nathanfriend/roggle/server/server.js ./server/server.js

CMD [ "npm", "start" ]