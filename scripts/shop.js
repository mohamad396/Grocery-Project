const products = [
 {
  id: 1, 
  picture: "Images/V7soda.jpg",
  name: "V Soda",
  price: 10.00,
  categories: ["Beverages"]
 },
 { 
  id: 2,
  picture: "Images/pasta.jpg",
  name: "Whole Wheat Pasta",
  price: 3.00,
  categories: ["Pantry"]
 },
 {
  id: 3,
  picture: "Images/sauce.jpg",
  name: "Canned Tomato Sauce",
  price: 3.00,
  categories: ["Pantry"]
 },
 {
  id: 4,
  picture: "Images/biscuit.jpg",
  name: "McVities Digestive Chocolate Biscuit",
  price: 5.00,
  categories: ["Snacks"]
 },
 {
  id: 5,
  picture: "Images/Tomato.jpg",
  name: "Tomato 1 kilo",
  price: 4.99,
  categories: ["Vegetables"]
 },
 {
  id: 6,
  picture: "Images/Strawberry.webp",
  name: "Strawberries 1 kilo",
  price: 3.99,
  categories: ["Fruits"]
 },
 {
  id: 7,
  picture: "Images/Avocado.jpg",
  name: "Avocadoes 1 kilo",
  price: 6.00,
  categories: ["Fruits"]
 },
 {
  id: 8,
  picture: "Images/tuna.jpg",
  name: "Tuna fillet",
  price: 20.00,
  categories: ["Meats"]
 },
 {
  id: 9,
  picture: "Images/bread.jpg",
  name: "White Bread",
  price: 29.99,
  categories: ["Pantry"]
 },
 {
  id: 10,
  picture: "Images/liptonblack.jpg",
  name: "Lipton black tea",
  price: 30.00,
  categories: ["Pantry"]
 }
];

const productsContainer = document.querySelector(".products");
const sortBySelect = document.querySelector(".sort select");
const categoryMenu = document.querySelector(".menu");
const priceInput = document.querySelector(".price-input");
let category = "All Products";
let maxPrice = Infinity;
let sortBy = 0;

sortBySelect.addEventListener("change", e => {
 switch (e.target.value) {
  case "lth": sortBy =  1; break;
  case "htl": sortBy = -1; break;
  default: sortBy =  0;
 }

 renderItems();
});

categoryMenu.addEventListener("click", e => {
 if (!(e.target instanceof HTMLLIElement)) return;

 category = e.target.textContent;
 renderItems()
});

priceInput.addEventListener("change", e => {
 maxPrice = e.target.value;

 renderItems();
})

function renderItems() {
 productsContainer.innerHTML = ""; 

 products
  .filter(product => product.price < maxPrice)
  .filter(product => product.categories.includes(category) || category == "All Products")
  .sort((p1, p2) => sortBy * (p1.price - p2.price))
  .forEach(product => {
   const productDiv = document.createElement("div");
   productDiv.classList.add("product-card");
   productDiv.innerHTML = `
    <img src="${product.picture}" alt="${product.name}" />
    <p>${product.name}</p>
    <span>${product.price.toFixed(2)}EGP</span>
    <br>
    <button class="btn">Add to Cart</button>
   `;

  productsContainer.appendChild(productDiv);
 });
}

renderItems();
/* 
 - Added the ability to edit and remove cart items
 - Added the ability to sort and filter products

 If you think there's anything missing, tell me and i'll get on it right away, otherwise i'm ready to push this to the git repo
*/