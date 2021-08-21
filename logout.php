<?php
require 'vendor/User.php';
require 'vendor/Online.php';
session_start();
ONLINE::setUserOffline($_SESSION['id']);
session_destroy();
header('Location: index.php');