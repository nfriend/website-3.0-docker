# IMPORTANT REMINDER!
# This file must be saved using Unix-style line endings.
# Saving this file with Windows-style line endings causes
# "no such file or directory" errors.  More info here:
# https://willi.am/blog/2016/08/11/docker-for-windows-dealing-with-windows-line-endings/

#!/bin/bash
set -e

# Remove a potentially pre-existing server.pid for Rails.
rm -f /rails-tutorial/tmp/pids/server.pid

# Fix "cannot assign requested address" error
# https://github.com/locomotivecms/wagon/issues/340#issuecomment-343646069
cp /etc/hosts /etc/hosts.new && \
sed -i 's/::1\tlocalhost ip6-localhost ip6-loopback/::1 ip6-localhost ip6-loopback/' /etc/hosts.new && \
cp -f /etc/hosts.new /etc/hosts

# Then exec the container's main process (what's set as CMD in the Dockerfile).
exec "$@"