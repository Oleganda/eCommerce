<?php require_once('templates/header.php');
require_once(ROOT_PATH . '/autoload.php');
?>



<?php
$errors = Validation::get_errors();

if (is_array($errors) || is_object($errors)) {
    foreach ($errors as $error) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
<?php endforeach;
} else {

    echo '<div class="alert alert-danger" role="alert">An unexpected error occurred. Please try again.</div>';
}
?>




<form style="padding-left: 200px; padding-right: 200px;" action="./controller/registercontroller.php" method="POST">
    <div class="mb-3">
        <label for="fname" class="form-label">First name</label>
        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo Validation::get_value('fname') ?>">
    </div>

    <div class="mb-3">
        <label for="lname" class="form-label">Last name</label>
        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo Validation::get_value('lname') ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>



    <button type="submit" class="btn btn-primary" name="register">Register</button>
</form>

<?php require_once('templates/footer.php') ?>