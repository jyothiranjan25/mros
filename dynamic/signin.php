<?php
include('../includes/dbconnection.php');



require "vendor/autoload.php";

use myPHPnotes\Microsoft\Auth;


// $tenant = "common";
// $client_id = "46fd09c2-8441-4b79-8acf-a61eeb0e02d8";
// $client_secret = "tvf7Q~fTpJOSglK9EeIxpdKMb5Ag9NXPEPK2j";
// $callback = "http://localhost/mros/dynamic/login.php";
// $scopes = ["User.Read"];

$microsoft = new Auth($tenant, $client_id, $client_secret, $callback, $scopes);

header("location: " . $microsoft->getAuthUrl());
