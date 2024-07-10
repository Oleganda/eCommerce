<?php
require_once('templates/header.php');
require_once(ROOT_PATH . '/autoload.php');


if (!isset($_SESSION['products'])) {
    header("Location: controller/productcontroller.php");
    exit();
}

$products = $_SESSION['products'];
?>

<div class="container my-4">
    <h1 class="text-center mb-4">Products</h1>
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="<?= htmlspecialchars($product['img'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></h4>
                        <p class="card-text"><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="card-footer">
                        <strong>Price: $<?= htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8') ?></strong>
                        <br>
                        <small class="text-muted">Stock: <?= htmlspecialchars($product['stock'], ENT_QUOTES, 'UTF-8') ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once('templates/footer.php'); ?>