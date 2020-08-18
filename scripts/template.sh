#!/usr/bin/env bash

# Navigate to the working directory this script requires
pushd /home/gitlabci/website-3.0-docker/node_modules/@nathanfriend/website-3.0

function htmlEscape () {
  local s
  s=${1//&/&amp;}
  s=${s//</&lt;}
  s=${s//>/&gt;}
  s=${s//'"'/&quot;}
  s=${s//\'/&#39;}

  printf -- %s "$s"
}

function replaceInHtmlFiles () {
  echo "  - ${1}: ${2}"

  perl -p -i -s -e 's{\Q$pattern}{$replacement}g' -- -pattern="${1}" -replacement="${2}" $(grep --include=\*.html -rnl '.' -e ${1})
}

# Read git info from files published with the package
CI_COMMIT_SHA=$(htmlEscape "$(cat CI_COMMIT_SHA)")
CI_COMMIT_SHORT_SHA=$(htmlEscape "$(cat CI_COMMIT_SHORT_SHA)")
CI_COMMIT_MESSAGE=$(htmlEscape "$(cat CI_COMMIT_MESSAGE)")

echo "Templating the follow substitutions into all rendered .html pages in @nathanfriend/website-3.0:"

replaceInHtmlFiles '%%DEPLOY_DATE%%' $(date -u '+%Y-%m-%d')
replaceInHtmlFiles '%%DEPLOY_TIME%%' $(date -u '+%H:%M:%S')
replaceInHtmlFiles '%%COMMIT_URL%%' "https://gitlab.com/nfriend/website-3.0/-/commit/${CI_COMMIT_SHA}"
replaceInHtmlFiles '%%COMMIT_MESSAGE%%' "${CI_COMMIT_MESSAGE}"
replaceInHtmlFiles '%%COMMIT_SHA%%' "${CI_COMMIT_SHORT_SHA}"

# Navigate back to the user's original working directory
popd
