<?php

// 
if (strpos($_SERVER['REQUEST_URI'], '.') !== false) {
	return false;
	exit;
}

require_once('../myRouter.php');
