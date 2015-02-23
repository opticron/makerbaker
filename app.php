<?php

//complain loudly about errors if we are on dev.
if ( array_shift(explode('.',gethostname())) == "dev" ) {
	error_reporting(-1); ini_set("display_errors","TRUE");
}

//automatically include undefined objects 
spl_autoload_register(function ($class) {
	$filename = 'includes/' . $class . '.class.php';
	if ( file_exists($filename) ) {
		require_once($filename);
	} else {
		require_once('../' . $filename);
	}
});

//config
$config = array();
$config["app_name"] = "Maker Baker";
$config["app_path"] = ".";
$config["error_text"] = " Contact the netadmins at netadmin@lists.makerslocal.org for help with this.";
$config["timeout"] = 60;
$config["local"] = "10.56."; //if your IP starts with this, you're at the shop

//templates
$template = array();
$template["header"] = '<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>' . $config["app_name"] . '</title>

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/app.css" rel="stylesheet">


</head>
<body>
<img id="logo" src="img/makerbaker.svg">
';
$template["footer"] = '';

