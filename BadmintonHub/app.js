/* =========================
   SHOPPING CART
========================= */

const cart = document.getElementById("cart");
const cartIcon = document.getElementById("cart-icon");
const closeCart = document.getElementById("close-cart");
const cartItems = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");
const cartCount = document.getElementById("cart-count");
const checkoutTotal = document.getElementById("checkout-total");

let total = 0;
let count = 0;

/* =========================
   SCROLL ANIMATIONS
========================= */
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("slide-show");
    }
  });
}, { threshold: 0.15 });

document.addEventListener("DOMContentLoaded", () => {
  const hiddenElements = document.querySelectorAll(".slide-hidden");
  hiddenElements.forEach((el) => observer.observe(el));
});

/* =========================
   DARK MODE TOGGLE
========================= */
const themeToggle = document.getElementById("theme-toggle");
const body = document.body;

// Check localStorage for theme preference
if (localStorage.getItem("theme") === "dark") {
  body.classList.add("dark-mode");
  themeToggle.textContent = "☀️";
}

themeToggle.addEventListener("click", () => {
  body.classList.toggle("dark-mode");
  if (body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark");
    themeToggle.textContent = "☀️";
  } else {
    localStorage.setItem("theme", "light");
    themeToggle.textContent = "🌙";
  }
});

cartIcon.addEventListener("click", () => {
  cart.classList.add("active");
});

closeCart.addEventListener("click", () => {
  cart.classList.remove("active");
});

const addButtons = document.querySelectorAll(".add-to-cart");

addButtons.forEach(button => {

  button.addEventListener("click", (e) => {

    e.preventDefault();

    const name = button.dataset.name;
    const price = parseInt(button.dataset.price);

    const item = document.createElement("div");

    item.classList.add("cart-item");

    item.innerHTML = `
      <div>
        <h4>${name}</h4>
        <p>RM${price}</p>
      </div>

      <button class="remove-item">
        ❌
      </button>
    `;
    cartItems.appendChild(item);
    const removeBtn = item.querySelector(".remove-item");

removeBtn.addEventListener("click", () => {

  item.remove();

  total -= price;
  count--;

  cartTotal.textContent = total;
  cartCount.textContent = count;
  checkoutTotal.value = total;

  if(count <= 0){

    cartItems.innerHTML =
    "<p>Your cart is empty.</p>";

    total = 0;
    count = 0;

    cartTotal.textContent = 0;
    cartCount.textContent = 0;
    checkoutTotal.value = 0;

  }

});

    if(cartItems.innerHTML.includes("Your cart is empty.")){
      cartItems.innerHTML = "";
    }

    cartItems.appendChild(item);

    total += price;
    count++;

    cartTotal.textContent = total;
    cartCount.textContent = count;
    checkoutTotal.value = total;

  });

});