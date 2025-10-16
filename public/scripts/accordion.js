const accordion_panels = document.getElementsByClassName("accordion_1");

for (var i = 0; i < accordion_panels.length; i++) {
  accordion_panels[i].addEventListener("click", function () {
    var something = this.children[1];
    if (something.style.display == "block") {
      something.style.display = "none";
    } else {
      something.style.display = "block";
    }
  });
}
