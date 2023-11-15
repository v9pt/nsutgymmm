'use strict';



/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const navLinks = document.querySelectorAll("[data-nav-link]");

const toggleNavbar = function () { navbar.classList.toggle("active"); }

addEventOnElem(navTogglers, "click", toggleNavbar);

const closeNavbar = function () { navbar.classList.remove("active"); }

addEventOnElem(navLinks, "click", closeNavbar);
document.addEventListener("DOMContentLoaded", function () {
  // Initialize the counter value
  let counterValue = 0;

  // Get the counter element
  const counterElement = document.getElementById("counter");

  // Function to update the counter value and display
  function updateCounter() {
      // Simulate fetching the live count from the server (replace this with your actual data fetching logic)
      // For example, you might use AJAX to fetch data from a server
      // For now, let's just increment the counter for demonstration purposes
      counterValue += 1;

      // Update the counter display
      counterElement.textContent = counterValue;

      // Schedule the next update (adjust the interval as needed)
      setTimeout(updateCounter, 5000); // Update every 5 seconds (5000 milliseconds)
  }

  // Start the initial update
  updateCounter();
});


/**
 * header & back top btn active
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});