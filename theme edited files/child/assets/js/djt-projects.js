window.addEventListener("DOMContentLoaded", function () {
  startProjectFilter();
  //addFilterElement();
});

function startProjectFilter() {
  const projectFilterEl = document.querySelector(".djt-project-filter");
  if (projectFilterEl == null) return;

  const filterFirstEl = projectFilterEl.querySelector("li");
  if (filterFirstEl == null) return;

  setTimeout(() => {
    filterFirstEl.click();
  }, 2000);
}

function addFilterElement() {
  const projectsFilterEl = document.querySelector(".djt-project-filter");
  if (projectsFilterEl == null) return;

  const projectFilterList = projectsFilterEl.querySelector(".selector-ul");
  if (projectFilterList == null) return;
  const linkEl = document.createElement("li");
  linkEl.classList.add("djt-filter-link");
  const buttonEl = document.createElement("button");
  buttonEl.textContent = "Button text";

  linkEl.appendChild(buttonEl);
  projectFilterList.appendChild(linkEl);
}
