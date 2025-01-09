<?php
include_once '../models/client.php';
session_start();


$clients = client::getAllData();
include '../views/viewClient.php';



if (isset($_GET['canceledForm'])) {
    # code...
}
