const accordions = document.querySelectorAll(".accordion-block");

// accordions

for (i = 0; i < accordions.length; i++) {
  accordions[i].addEventListener("click", function () {
    accordions.forEach((accordion) =>
      accordion.classList.remove("accordion-active")
    );

    this.classList.add("accordion-active");
  });
}

// end accordions