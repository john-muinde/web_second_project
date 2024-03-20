<?php
$page = "Login";
$body_class = "overflow-hidden";
?>
<div class="d-flex justify-content-center">
  <form action="" class="unset-form-padding unset-form-width" id="login-form">
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
      toaster.success("Login successful! Redirecting...");
      setTimeout(() => {
        form.submit();
      }, 3000);
    }
  });
</script>
</body>

</html>