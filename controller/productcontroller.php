<?php


define("ROOT_PATH", dirname(__DIR__));
require_once(ROOT_PATH . '/autoload.php');
require_once(ROOT_PATH . '/models/productsModel.php');

session_start();

$productModel = new ProductModel();

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? 0;
$stock = $_POST['stock'] ?? 0;
$active = isset($_POST['active']) ? 1 : 0;
$img = $_POST['img'] ?? '';

$product_id = $productModel->addProduct($name, $description, $price, $stock, $active, $img);

if ($product_id) {
    // fetching all products
    $products = $productModel->getAllProducts();
    // storing prodcuts in sess
    $_SESSION['products'] = $products;

    header('Location: /ecommerce/productpage.php?success=1');
    exit;
} else {

    header('Location: index.php?error=1');
    exit;
}
