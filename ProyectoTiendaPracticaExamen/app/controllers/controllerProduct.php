<?php
include_once '../models/product.php';


session_start();

$products = product::getAlldata();
include '../views/viewProduct.php';

if (isset($_GET['canceledForm'])) {
    # code...
}
