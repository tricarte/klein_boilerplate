<?php
// router.php

// browser-sync uses this kind url but this annoys router.php
// /static/css/styles.css?rel=1341343434
$uri = explode("?", $_SERVER['REQUEST_URI'])[0];

if (file_exists(__DIR__ . '/' . $uri)) {
    return false; // serve the requested resource as-is.
} else {
    include_once 'index.php';
}
