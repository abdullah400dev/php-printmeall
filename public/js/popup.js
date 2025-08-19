const popups = document.querySelector(".popups");
const verifiedButton = document.querySelector(".verified-btn");
const verifiedPopup = document.querySelector(".verified");
const verifiedOverlay = document.querySelector(".verified-overlay");
const hole1 = document.querySelector(".hole1");

document.querySelector("body").style.overflow = "hidden";

verifiedButton.addEventListener("click", function () {
  verifiedPopup.classList.remove("show");
  hole1.classList.add("show");
});
verifiedOverlay.addEventListener("click", function () {
  verifiedPopup.classList.remove("show");
  hole1.classList.add("show");
});

hole1.addEventListener("click", function () {
  this.classList.remove("show");
  document.querySelector("body").style.overflow = "auto";
  popups.style.display = "none";
});