#!/usr/bin/env bash

echo "Regenerating fortune-cookie.json..."
node node_modules/@nathanfriend/fortune-flash-briefings/update-fortune-cookie.js > fortune-cookie.json
echo "Result:"
cat fortune-cookie.json

echo "Regenerating oddly-specific-fortunes.json..."
node node_modules/@nathanfriend/fortune-flash-briefings/update-oddly-specific-fortunes.js > oddly-specific-fortunes.json
echo "Result:"
cat oddly-specific-fortunes.json

echo "Copying fortune-cookie.json to server..."
scp -P ${SSH_PORT} fortune-cookie.json ${SERVER_USER}@${SERVER_ADDR}:/home/${SERVER_USER}/website-3.0/flash-briefings/fortune-cookie.json

echo "Copying oddly-specific-fortunes.json to server..."
scp -P ${SSH_PORT} oddly-specific-fortunes.json ${SERVER_USER}@${SERVER_ADDR}:/home/${SERVER_USER}/website-3.0/flash-briefings/oddly-specific-fortunes.json
