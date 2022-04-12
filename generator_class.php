<?php
session_start();
$_SESSION['view_data'] = "";


$request = file_get_contents("php://input"); // gets the raw data

$_SESSION['view_data'] = $request;


