#!/usr/bin/env bash
PHP=$(which php)
$PHP -S localhost:8080 -t ./ -c php.ini router.php
