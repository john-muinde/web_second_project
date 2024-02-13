const navbar = document.querySelector(".navbar");
const navbar_items = [...document.querySelectorAll(".nav-item .nav-link")];
window.addEventListener("scroll", () => {
  if (window.scrollY > 0) {
    navbar.classList.add("blurred");
    document
      .querySelector(".logo")
      .setAttribute("src", "logo-artistic-black.png");
  } else {
    navbar.classList.remove("blurred");
    document
      .querySelector(".logo")
      .setAttribute("src", "logo-artistic-color.png");
  }
});
