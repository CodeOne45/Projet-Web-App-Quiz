<?php

//Détruire les variable de la session login

session_start();
session_unset();
session_destroy();

header('location: ..\views\index');
exit();
