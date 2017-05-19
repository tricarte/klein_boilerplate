#!/usr/bin/env bash
BROWSERSYNC=$(which browser-sync)
$BROWSERSYNC start --proxy localhost:8080 --files "views/**/*.php" "static/js/*" "static/css/*" "index.php" --no-ui --no-online
