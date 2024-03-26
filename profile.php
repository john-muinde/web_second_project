<?php
include 'operations.php';
$page = "Profile";
$body_class = "overflow";

$user = $_SESSION['user'];
ob_start();
?>

<form method="post" action="update_profile.php" class="unset-form-padding unset-form-width" style="margin-top: 16vh" id="register-form" enctype="multipart/form-data">
    <div class="form-container">
        <!-- add a profile picture with an upload button -->
        <div class="d-flex justify-content-center align-items-center flex-column">
            <img id="image_preview" src="<?= isset($user['profile_picture']) && !empty($user['profile_picture']) ? $user['profile_picture'] : 'https://via.placeholder.com/150' ?>" alt="profile picture" class="rounded-circle" />
            <input type="file" name="profile_picture" id="profile_picture" style="display: none" onchange="previewImage(event)" />
            <div></div>
            <label for="profile_picture" class="btn btn-primary">Upload Picture</label>
        </div>
        <h1 class="header-title text-center">Profile</h1>
        <label for="name">Name:</label>
        <input type="text" id="name" name="full_name" value="<?= $user['full_name'] ?>" /><br />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $user['email'] ?>" /><br />
        <div class="d-flex justify-content-center align-items-baseline w-75">
            <label for="update_password" style="width: 100%">Update Password:</label>
            <input style="width: 10%" type="checkbox" id="update_password" name="update_password" /><br />
        </div>

        <div id="password_fields" style="display: none;">
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" placeholder="Enter your Password" />
                <i id="toggle-password" class="fa fa-eye-slash" aria-hidden="true"></i>
            </div>
            <br />

            <!-- Create the rules for the password as ul below here -->

            <ul class="password-rules">
                <li class="password-length">
                    Password must be at least 6 characters
                </li>
                <li class="password-uppercase">
                    Password must contain at least one uppercase letter
                </li>
                <li class="password-lowercase">
                    Password must contain at least one lowercase letter
                </li>
                <li class="password-number">
                    Password must contain at least: one number
                </li>
                <li class="password-symbol">
                    Password must contain at least: one symbol
                </li>
                <li class="password-match">
                    Password and confirm password must match
                </li>
            </ul>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your Password" /><br />
        </div>

        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('image_preview');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

        <script>
            document.getElementById('update_password').addEventListener('change', function() {
                document.getElementById('password_fields').style.display = this.checked ? 'block' : 'none';
                document.querySelector('.cont').classList.toggle('h-100');
            });
        </script>

        <label>Gender:</label><br />
        <div class="d-flex justify-content-center align-items-baseline w-50">
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="male" <?= $user['gender'] == 'male' ? 'checked' : '' ?> />
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female" <?= $user['gender'] == 'female' ? 'checked' : '' ?> />
        </div>

        <center>
            <input type="submit" value="Update Details" />
        </center>
    </div>
</form>

<?php
$heroContent = ob_get_clean();
include 'includes/header.php';
?>

<script>
    const form = document.querySelector("#register-form");
    const password = document.querySelector("#password");
    const confirm_password = document.querySelector("#confirm_password");
    const passwordRules = document.querySelector(".password-rules");
    const passwordLength = document.querySelector(".password-length");
    const passwordSymbol = document.querySelector(".password-symbol");
    const passwordUppercase = document.querySelector(".password-uppercase");
    const passwordLowercase = document.querySelector(".password-lowercase");
    const passwordNumber = document.querySelector(".password-number");
    const passwordMatch = document.querySelector(".password-match");
    const editingPassword = document.querySelector("#update_password");

    if (editingPassword.checked)
        password.addEventListener("input", (e) => {
            const value = e.target.value;
            if (value.length >= 6) {
                passwordLength.style.color = "green";
            } else {
                passwordLength.style.color = "red";
            }

            const uppercase = /[A-Z]/;
            if (uppercase.test(value)) {
                passwordUppercase.style.color = "green";
            } else {
                passwordUppercase.style.color = "red";
            }

            const lowercase = /[a-z]/;
            if (lowercase.test(value)) {
                passwordLowercase.style.color = "green";
            } else {
                passwordLowercase.style.color = "red";
            }

            const number = /[0-9]/;
            if (number.test(value)) {
                passwordNumber.style.color = "green";
            } else {
                passwordNumber.style.color = "red";
            }

            const symbol = /[!@#\$%\^&\*]/;
            if (symbol.test(value)) {
                passwordSymbol.style.color = "green";
            } else {
                passwordSymbol.style.color = "red";
            }

            if (confirm_password.value === value) {
                passwordMatch.style.color = "green";
            } else {
                passwordMatch.style.color = "red";
            }
        });
    if (editingPassword.checked)
        confirm_password.addEventListener("input", (e) => {
            const value = e.target.value;
            if (value === password.value) {
                passwordMatch.style.color = "green";
            } else {
                passwordMatch.style.color = "red";
            }
        });

    document
        .getElementById("toggle-password")
        .addEventListener("click", function(e) {
            if (typeof password === 'undefined') return;
            const type =
                password.getAttribute("type") === "password" ?
                "text" :
                "password";
            if (typeof confirm_password === 'undefined') return;
            confirm_password.setAttribute("type", type);
            password.setAttribute("type", type);
            if (this.classList.contains("fa-eye-slash")) {
                this.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                this.classList.replace("fa-eye", "fa-eye-slash");
            }
        });
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const name = form.name.value;
        const email = form.email.value;
        const password = form.password.value;
        const confirm_password = form.confirm_password.value;
        const gender = form.gender.value;

        let error = false;

        if (name === "") {
            toaster.error("Name is required");
            return;
        }

        // name pattern which also accepts spaces
        const namePattern = new RegExp("^[a-zA-Z ]{3,}$");
        if (!namePattern.test(name)) {
            toaster.error("Name must contain only letters and spaces");
            return;
        }

        if (email === "") {
            toaster.error("Email is required");
            return;
        }
        if (editingPassword.checked)
            if (password === "") {
                toaster.error("Password is required");
                return;
            }
        if (gender === "") {
            toaster.error("Gender is required");
            return;
        }
        if (editingPassword.checked)
            if (password.length < 6) {
                toaster.error("Password must be at least 6 characters");
                return;
            }

        // create a pattern for the password
        const pattern = new RegExp(
            "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\\$%\\^&\\*])"
        );
        if (editingPassword.checked)
            if (!pattern.test(password)) {
                toaster.error(
                    "Password must contain at least one uppercase letter, one lowercase letter, one number and one special character"
                );
                return;
            }
        if (editingPassword.checked)
            if (password !== confirm_password) {
                toaster.error("Passwords do not match");
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