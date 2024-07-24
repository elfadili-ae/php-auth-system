<?php
require "includes/header.php";

require "config.php";

$isError = false;
$err_message = "";
if (isset($_POST["submit"])) {
  if ($_POST["email"] == '') {
    $isError = true;
    $err_message = "The email is required.";

  } else if ($_POST["username"] == '') {
    $isError = true;
    $err_message = "The username is required.";

  } else if ($_POST["password"] == '') {
    $isError = true;
    $err_message = "The password is required.";

  } else {
    $isError = false;
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $insert = $conn->prepare("INSERT INTO users (email, username, passwd) VALUES (:email, :username, :passwd)");

    $insert->execute([
      ":username" => $username,
      ":email" => $email,
      ":passwd" => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $path = $_SERVER['SCRIPT_NAME'];
    $dir = dirname($path);
    header("location: $dir/login.php");
    exit();
  }
}
?>


<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">

    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <?php
    if ($isError) {
      echo "<p style='color:red;'>$err_message</p>";
    }
    ?>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account? <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>