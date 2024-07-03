<?php
define("ROOT_PATH", dirname(__DIR__));
require_once(ROOT_PATH . '/autoload.php');
require_once(ROOT_PATH . '/models/authModel.php');


if (isset($_POST['register'])) {
    $errors = [];
    $fname = trim($_POST['fname']);
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    if (empty($fname)) {
        Validation::set_errors('First name cabbot be empty ');
    }

    if (empty($lname)) {
        Validation::set_errors('Last name cannot be empty ');
    }

    if (empty($phone)) {
        Validation::set_errors('Phone cannot be empty ');
    }

    if (empty($email)) {
        Validation::set_errors('Email cannot be empty ');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        Validation::set_errors('Email cannot be short');
    }

    if (empty($pass)) {
        Validation::set_errors('Password cannot be empty ');
    } elseif (strlen($pass) < 8) {
        Validation::set_errors('Password cannot be short ');
    }

    // Save errors to session
    // Validation::set_errors($errors);

    if (empty(Validation::is_errors())) {
        Validation::set_value($_POST);
        header("Location: ../register.php");
        echo "<script>alert('Registration successful!');</script>";
    } else {
        $authModel = new AuthModel();
        $authModel->register($fname, $lname, $email, $phone, $pass);
        header("Location: ../register.php");
    }
}
