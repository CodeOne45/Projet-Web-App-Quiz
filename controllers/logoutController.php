<?php

//destroy session login

session_start();
session_unset();
session_destroy();

header('location: index');

exit();
