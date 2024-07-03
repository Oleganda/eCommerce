<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION["adm"])) {
    header("Location: index.php");
    exit;
}

require_once "db_connect.php";

$error = false;

function cleanInputs($input)
{
    $data = trim($input);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);

    return $data;
}

$email = "";
$emailError = $passError = "";

if (isset($_POST["login"])) {
    $email = cleanInputs($_POST["email"]);
    $password = cleanInputs($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter a valid email address";
    }

    if (empty($password)) {
        $error = true;
        $passError = "Password can't be empty!";
    }

    if (!$error) {
        $password = hash("sha256", $password);

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if ($row["role"] == "adm") {
                $_SESSION["adm"] = $row["id"];
                header("Location: index.php");
            } else {
                $_SESSION["user"] = $row["id"];
                header("Location: index.php");
            }
            exit;
        } else {
            echo "<div class='alert alert-danger'>
                        <p>Something went wrong, please try again later ...</p>
                      </div>";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">KNIT WITH LOVE</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Welcome to login</h2>
                                <p>Don't have an account?</p>
                                <a href="register.php" class="btn btn-white btn-outline-white rounded-0">Register here</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
                            <form action="login.php" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="Email address" value="<?= htmlspecialchars($email) ?>">
                                    <span class="text-danger"><?= $emailError ?></span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control rounded-0" id="password" name="password">
                                    <span class="text-danger"><?= $passError ?></span>
                                </div>
                                <div class="form-group">
                                    <button name="login" type="submit" class="form-control btn btn-primary submit px-3 rounded-0">Log In</button>
                                </div>


                            </form>
                            <div>Dont have account yet?</div>
                            <div class="form-group">
                                <a href="register.php"><button name="login" class=" btn btn-primary submit px-3 rounded-0">Regester</button></a>
                            </div>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>