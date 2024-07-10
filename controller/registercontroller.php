<?php
// session_start();

define("ROOT_PATH", dirname(__DIR__));
require_once(ROOT_PATH . '/autoload.php');
require_once(ROOT_PATH . '/models/authModel.php');

if (isset($_POST['register'])) {
    $errors = [];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    if (empty($fname)) {
        $errors[] = 'First name cannot be empty';
    }

    if (empty($lname)) {
        $errors[] = 'Last name cannot be empty';
    }

    if (empty($phone)) {
        $errors[] = 'Phone cannot be empty';
    }

    if (empty($email)) {
        $errors[] = 'Email cannot be empty';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors[] = 'Password cannot be empty';
    } elseif (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long';
    }

    // Save errors to session
    if (!empty($errors)) {
        Validation::set_errors($errors);
    }

    // If there are no errors, proceed with registration
    if (!Validation::is_errors()) {
        $authModel = new AuthModel();
        $authModel->register($fname, $lname, $email, $phone, $password);

        // Set the values in session to keep the form filled in case of an error
        Validation::set_value('fname', $fname);
        Validation::set_value('lname', $lname);
        Validation::set_value('email', $email);
        Validation::set_value('phone', $phone);

        header("Location: ../register.php");
        echo "<script>alert('Registration successful!');</script>";
    } else {
        // Set the values in session to keep the form filled in case of an error
        Validation::set_value('fname', $fname);
        Validation::set_value('lname', $lname);
        Validation::set_value('email', $email);
        Validation::set_value('phone', $phone);

        header("Location: ../register.php");
        exit();
    }
}
