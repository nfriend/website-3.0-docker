#!/usr/bin/env bash

##
## Run ssh-agent (inside the build environment)
##
eval $(ssh-agent -s)

##
## Add the SSH key stored in SSH_PRIVATE_KEY variable to the agent store
## We're using tr to fix line endings which makes ed25519 keys work
## without extra base64 encoding.
## https://gitlab.com/gitlab-examples/ssh-private-key/issues/1#note_48526556
##
echo "$SSH_PRIVATE_KEY" | tr -d '\r' | ssh-add -

##
## Create the SSH directory and give it the right permissions
##
mkdir -p ~/.ssh
chmod 700 ~/.ssh

##
## Verify the SSH host keys.
## See https://docs.gitlab.com/ee/ci/ssh_keys/#verifying-the-ssh-host-keys
##
echo "$SSH_KNOWN_HOSTS" >> ~/.ssh/known_hosts
chmod 644 ~/.ssh/known_hosts
