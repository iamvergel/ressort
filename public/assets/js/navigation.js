let navBar = document.querySelector(".navbar");
let nav = document.querySelector(".nav");

function onScroll() {
  if (window.scrollY > 0) {
    navBar.style.height = "80px";
    nav.style.position = "relative";
    nav.style.top = "-1.5rem";
    navBar.style.backgroundColor = "#ffecd0";
  } else {
    navBar.style.height = "100px";
    nav.style.position = "relative";
    nav.style.top = "0";
    navBar.style.backgroundColor = "#fff";
  }
}

window.addEventListener("scroll", onScroll);
