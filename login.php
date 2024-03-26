<?php
include 'operations.php';
$page = "Login";
$body_class = "overflow-hidden";

ob_start();
?>
<div class="d-flex justify-content-center">
  <form method="post" class="unset-form-padding unset-form-width" id="login-form">
    <div class="form-container">
      <h1 class="header-title text-center">Login</h1>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" /><br />

      <label for="password">Password:</label>
      <div class="password-container">
        <input type="password" id="password" name="password" placeholder="Enter your Password" />
        <i id="toggle-password" class="fa fa-eye-slash" aria-hidden="true"></i>
      </div>
      <br />
      <p class="p-3">
        Don't have an account? <a href="register.html">Register here</a>
      </p>
      <center>
        <input type="submit" value="Login" />
        <!-- Clear form -->
        <input type="reset" value="Clear Form" />
      </center>
    </div>
  </form>
</div>
<?php
$heroContent = ob_get_clean();
include 'includes/header.php';

$success = "";
$unsuccess = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user = mysqli_query($DB, "SELECT * FROM accounts WHERE email = '$email'");

  if (!$user || mysqli_num_rows($user) <= 0) {
    $unsuccess = "Kindly register an account first.";
    $_SESSION['success'] = $success;
    $_SESSION['unsuccess'] = $unsuccess;
  } else {
    $user = mysqli_fetch_assoc($user);
    $password_match = password_verify($password, $user['password']);
    if ($password_match) {
      $success = "Login successful. Welcome " . $user['email'];
      $_SESSION['user'] = $user;
      $_SESSION['success'] = $success;
      $_SESSION['unsuccess'] = $unsuccess;
      echo "<script>location.href='index.php'</script>";
    } else {
      $unsuccess = "Password is incorrect";
    }
    $_SESSION['success'] = $success;
    $_SESSION['unsuccess'] = $unsuccess;
  }
}

?>

<script>
  document
    .getElementById("toggle-password")
    .addEventListener("click", function(e) {
      const passwordInput = document.getElementById("password");

      const type =
        passwordInput.getAttribute("type") === "password" ?
        "text" :
        "password";

      passwordInput.setAttribute("type", type);
      if (this.classList.contains("fa-eye-slash")) {
        this.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        this.classList.replace("fa-eye", "fa-eye-slash");
      }
    });
  const form = document.getElementById("login-form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = form.email.value;
    const password = form.password.value;

    let error = false;
    if (email === "") {
      toaster.error("Email is required");
      return;
    }
    if (password === "") {
      toaster.error("Password is required");
      return;
    }
    if (password.length < 6) {
      toaster.error("Password must be at least 6 characters");
      return;
    }

    if (!error) {
      form.submit();
    }
  });
</script>


<?php
include 'includes/footer.php';
?>