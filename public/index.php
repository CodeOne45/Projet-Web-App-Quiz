<?php

if (strpos($_SERVER['REQUEST_URI'], '.') !== false) { //TODO Not Work :(
    return false;
    exit;
}
require_once('../router.php');
