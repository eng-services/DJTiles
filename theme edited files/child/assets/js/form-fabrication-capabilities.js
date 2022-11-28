function checkParameter(search) {
  const queryString = window.location.search;
  if (queryString == "") return null;

  const urlParams = new URLSearchParams(queryString);
  const formParam = urlParams.get(search);
  return formParam;
}

function storageRedirect() {
  const formParam = checkParameter("form");
  if (formParam == "true") {
    localStorage.setItem("formSubmitted", true);
    const { origin, pathname } = window.location;
    window.location = origin + pathname;
    return;
  }

  const formSubmit = localStorage.getItem("formSubmitted");
  if (formSubmit != null) return;

  const currentUrl = window.location;
  const newURL = `${currentUrl.protocol}//${currentUrl.hostname}/capabilities`;
  window.location = newURL;
}

storageRedirect();
