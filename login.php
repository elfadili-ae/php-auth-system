<?php
require "includes/header.php";
require "config.php";


if (isset($_POST['submit'])) {
  if ($_POST['email'] == '') {
    echo "email is missing.";
  } else if ($_POST['password'] == '') {
    echo "password is missing.";
  } else {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $login = $conn->query("SELECT * FROM users WHERE email='$email'");

    $login->execute();

    $data = $login->fetch(PDO::FETCH_ASSOC);

    if ($login->rowCount() > 0) {
      if (password_verify($password, $data["passwd"])) {
        echo "Welcome back <b>" . $data['username'] . "</b>";
      }
    } else {
      echo "The email is not registered.";
    }

  }
}

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="user.name">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>