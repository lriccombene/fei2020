#!/bin/bash

docker-compuse exec app composer global require "fxp/composer-asset-plugin:^1.4.1"

docker-compuse exec app composer create-project --prefer-dist yiisoft/yii2-app-basic .