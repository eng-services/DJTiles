function checkLocalStorage() {
  const formElement = document.querySelector(".form-fabrication");
  if (formElement == null) return;

  const formSubmit = localStorage.getItem("formSubmitted");
  if (formSubmit == null) return;

  formElement.style.display = "none";

  const ctaElement = document.querySelector(".cta-form-redirection");
  if (ctaElement == null) return;
  ctaElement.style.display = "block";
}

function initGallery() {
  const tabElement = document.querySelector("#elementor-tab-title-2592");
  if (tabElement == null) return;
  tabElement.addEventListener("click", function () {
    const galleryElement = document.querySelector(
      "#elementor-tab-content-2592 .djt-gallery a[data-gallery-index='0']"
    );
    if (galleryElement == null) return;

    setTimeout(() => {
      galleryElement.click();
    }, 1000);
  });
}

function tabRedirect() {
  const tabElements = Array.from(
    document.querySelectorAll(".djt-capabilities-tab .elementor-tab-title")
  );
  if (tabElements.length == 0) return;

  tabElements.forEach((tabElement) => {
    const tabLinkEl = tabElement.querySelector(".djt-tab-link");
    if (tabLinkEl == null) return;
    tabElement.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      if (tabLinkEl.href == null) return;
      window.open(tabLinkEl.href, "_blank");
    });
  });
}

function changeTabURL() {
  const hashValue = window.location.hash.substring(1);
  if (hashValue == "" || null) return;

  const hashElement = document.getElementById(hashValue + "-tab");
  if (hashElement == null) return;

  const hashParent = hashElement.closest(".elementor-tab-title");
  if (hashParent == null) return;

  const hashInterval = setInterval(() => {
    clearInterval(hashInterval);
    hashParent.click();
    jQuery("html, body").animate(
      {
        scrollTop: jQuery(hashElement).offset().top - 150,
      },
      800
    );
  }, 1000);
}

window.addEventListener("DOMContentLoaded", function () {
  changeTabURL();
  checkLocalStorage();
  initGallery();
  tabRedirect();
});
