function toggleFixedNav() {
  const navbar = document.querySelector(".djtile-nav");
  if (navbar == null) return;
  const scrollingElement =
    document.scrollingElement || document.documentElement;
  const navbarHeight = navbar.getBoundingClientRect().height;

  window.addEventListener("scroll", (event) => {
    if (scrollingElement.scrollTop >= navbarHeight)
      navbar.classList.add("fixedNavClass");
    else navbar.classList.remove("fixedNavClass");
  });
}

window.addEventListener("DOMContentLoaded", function () {
  toggleFixedNav();
});
