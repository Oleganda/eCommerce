<?php
require_once('templates/header.php');
?>

<div class="container my-4">
    <h1 class="text-center mb-4">Add Product</h1>
    <form action="controller/productcontroller.php" method="POST">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="img">Image URL</label>
            <input type="text" class="form-control" id="img" name="img" required>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active" name="active">
                <label class="form-check-label" for="active">Active</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<?php require_once('templates/footer.php'); ?>