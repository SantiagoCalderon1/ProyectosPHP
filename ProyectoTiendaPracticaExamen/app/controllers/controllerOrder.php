<?php
include_once '../models/order.php';
session_start();


$orders = order::getAlldata();
include '../views/viewOrder.php';

if (isset($_GET['canceledForm'])) {
    # code...
}
