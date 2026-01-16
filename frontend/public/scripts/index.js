window.addEventListener("scroll", (e) => {
  if (
    document.documentElement.scrollTop >
    document.getElementById("header").offsetTop +
      document.getElementById("header").offsetHeight
  ) {
    if (
      document.documentElement.scrollTop >
      document.getElementById("team").offsetTop
    ) {
      document.getElementById("up").style.display = "none";
    } else {
      document.getElementById("up").style.display = "block";
    }
  } else {
    document.getElementById("up").style.display = "none";
  }
});
const services = document.getElementById("nav-services");
const service_btn = document.getElementById("services-link");
const get_started_link = document.getElementById("get-started");

function toggle_services() {
  if (window.getComputedStyle(services).getPropertyValue("display") == "none") {
    services.style.display = "flex";
  } else {
    services.style.display = "none";
  }
}

function set_services(value) {
  if (value) {
    services.style.display = "flex";
  } else {
    services.style.display = "none";
  }
}

function get_started() {
  get_started_link.click();
}
