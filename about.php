<?php
include 'operations.php';
$page = "About Us";
ob_start();
?>
<center>
  <h1>About Artistic Gallery</h1>
</center>
<center>
  <p>
    Art Gallery was created in 2020 by a group of art enthusiasts.<br />
    We have a wide range of paintings,sculptures, and other art forms.
    <br />We are the leading art gallery in the world. We have paintings
    <br />
    from the 16th century to the 21st century . We have paintings
    <br />
    from all the famous painters like
    <a href="https://en.wikipedia.org/wiki/Leonardo_da_Vinci" target="_blank">Leonardo da Vinci</a>,
    <a href="https://en.wikipedia.org/wiki/Pablo_Picasso" target="_blank">Pablo Picasso,</a><br />
    <a href="https://en.wikipedia.org/wiki/Vincent_van_Gogh" target="_blank">Vincent van Gogh</a>,
    <a href="https://en.wikipedia.org/wiki/Claude_Monet" target="_blank">Claude Monet</a>,
    <a href="https://en.wikipedia.org/wiki/Rembrandt" target="_blank">Rembrandt</a>, and many more.
  </p>
</center>
<?php
$heroContent = ob_get_clean();
include 'includes/header.php';
?>
<h1 class="header-title text-center p-3">Artistic Gallery Founders</h1>
<div class="card-container">
  <div class="card">
    <div class="image">
      <img src="/assets/images/john-kim.jpg" alt="" title="Founder - John kim" />
    </div>
    <div class="text-content">
      <h3>John Kim</h3>
    </div>
  </div>
  <div class="card">
    <div class="image">
      <img src="/assets/images/lary-mali.jpg" alt="" title="Founder - Lary Mali" />
    </div>
    <div class="text-content">
      <h3>Lary Mali</h3>
    </div>
  </div>
  <div class="card">
    <div class="image">
      <img src="/assets/images/mik-doe.jpeg" alt="" title="Founder - Mik Doe" />
    </div>
    <div class="text-content">
      <h3>Mik Doe</h3>
    </div>
  </div>
</div>
<!-- contact form with at least 5 input elements -->

<h1 class="header-title text-center p-3">Contact Us</h1>
<div class="d-flex justify-content-center">
  <form action="">
    <div class="form-container">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter your name" /><br />

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" /><br />

      <label for="phone">Phone Number:</label>
      <input type="number" id="phone" name="phone" style="padding: 12px 50px" placeholder="Enter your phone number" /><br />
      <!-- 
          <label for="address">Address:</label>
          <input
            type="text"
            id="address"
            name="address"
            placeholder="Enter your address"
          /><br /> -->
      <label for="message">Message:</label>
      <textarea id="message" name="message" cols="30" rows="10" placeholder="Enter your message"></textarea><br />

      <!-- <label>Gender:</label><br />
          <div class="d-flex justify-content-center align-items-baseline w-50">
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="male" />
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female" />
          </div> -->

      <fieldset>
        <legend>Reasons for Contact:</legend>
        <div class="form-group">
          <input type="checkbox" id="buying" name="reason" value="buying" />
          <label for="buying">Buying Artwork</label>
        </div>
        <div class="form-group">
          <input type="checkbox" id="donating" name="reason" value="donating" />
          <label for="donating">Donating Artwork</label>
        </div>
        <div class="form-group">
          <input type="checkbox" id="volunteering" name="reason" value="volunteering" />
          <label for="volunteering">Volunteering</label>
        </div>
        <div class="form-group">
          <input type="checkbox" id="sponsoring" name="reason" value="sponsoring" />
          <label for="sponsoring">Sponsoring</label>
        </div>
      </fieldset>

      <center>
        <input type="submit" value="Contact Us" />
        <!-- Clear form -->
        <input type="reset" value="Clear Form" />
      </center>
    </div>
  </form>
</div>
<script>
  const form = document.querySelector("form");

  function getValues() {
    // Select all checkboxes with the name "reason[]"
    const checkboxes = document.querySelectorAll('input[name="reason"]');

    // Filter for the checked checkboxes and map to their values
    const checkedValues = Array.from(checkboxes)
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => checkbox.value);

    return checkedValues;
  }

  // intl error codes
  var errorMap = [
    "Invalid number format",
    "Invalid country code: Kindly select a valid country for",
    "Phone Number is too short",
    "Phone Number is too long",
    "Unrecognized Phone number",
  ];

  const phoneInputField2 = document.querySelector("#phone");
  const phoneInput2 = window.intlTelInput(phoneInputField2, {
    preferredCountries: ["ke", "us", "in", "de"],
    initialCountry: "ke",
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });

  console.log(document.querySelector("[name=reason]"));
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const name = form.name.value;
    const email = form.email.value;
    const phone = form.phone.value;
    const message = form.message.value;
    const reason = form.reason.value;

    // check only for important inputs and send separate messages for each
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
      return;
      toaster.error("Email is required");
    }

    if (!phoneInput2.isValidNumber()) {
      var errorCode = phoneInput2.getValidationError();
      toaster.error(`${errorMap[errorCode]}: ${phoneInput2.getNumber()}`);
      return;
    } else if (!phoneInput2.getSelectedCountryData().dialCode) {
      toaster.error(
        `Kindly select a country for the phone number ${phoneInput2.getNumber()}`
      );
      return false;
      return;
    } else {
      phone.value = phoneInput2.getNumber();
    }

    if (message === "") {
      toaster.error("Message is required");
      return;
    }

    if (getValues().length === 0) {
      toaster.error("Reason for contact is required");
      return;
    }

    if (!error) {
      toaster.success("Message sent successfully");
      setTimeout(() => {
        form.submit();
      }, 3000);
    }
  });
</script>

<?php
include 'includes/footer.php';
?>