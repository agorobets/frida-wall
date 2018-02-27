#!/usr/bin/env bash
cd `dirname $0` && docker-compose run --rm api-tests php "$@"