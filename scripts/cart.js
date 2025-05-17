const cartGrid = document.querySelector(".cart-grid");
let items = [
 {
    id: 1,
    picture: "Images/Tomato.jpg",
    name: "Tomato 1 kilo",
    price: 4.99,
    quantity: 1
 },
 {
    id: 2,
    picture: "Images/Strawberry.webp",
    name: "Strawberries 1 kilo",
    price: 3.99,
    quantity: 2
 },
 {
    id: 3,
    picture: "Images/Avocado.jpg",
    name: "Avocadoes 1 kilo",
    price: 6.00,
    quantity: 1
 },
 {
    id: 4,
    picture: "Images/tuna.jpg",
    name: "Tuna fillet",
    price: 20.00,
    quantity: 3
 },
 {
    id: 5,
    picture: "Images/bread.jpg",
    name: "White Bread",
    price: 29.99,
    quantity: 3
 },
 {
    id: 6,
    picture: "Images/liptonblack.jpg",
    name: "Lipton black tea",
    price: 30.00,
    quantity: 3
 }
]

function renderItems() {
 cartGrid.innerHTML = "";
 items.forEach(item => {
  const cartItemDiv = document.createElement("div");
  cartItemDiv.classList.add("cart-item");
  cartItemDiv.innerHTML = `
   <img src="${item.picture}" class="cart-img" alt="${item.name}">
   <div class="item-name">${item.name}</div>
   <div class="quantity-controls">
     <button class="dec-btn" data-id="${item.id}">-</button>
     <span>${item.quantity}</span>
     <button class="inc-btn" data-id="${item.id}">+</button>
   </div>
   <div class="item-price">${item.price.toFixed(2)} EGP</div>
   <button class="remove-item" data-id="${item.id}">Remove from Cart</button>
  `;

  const decBtn = cartItemDiv.querySelector(".dec-btn");
  const incBtn = cartItemDiv.querySelector(".inc-btn");
  const removeBtn = cartItemDiv.querySelector(".remove-item");

  decBtn.addEventListener("click", decrementListener);
  incBtn.addEventListener("click", incrementListener);
  removeBtn.addEventListener("click", removeItemListener);

  cartGrid.appendChild(cartItemDiv);
 });
}

function decrementListener(e) {
 const id = e.target.dataset.id;
 const item = items.find(item => item.id == id);
 
 item.quantity = Math.max(item.quantity - 1, 0);
 renderItems()
}

function incrementListener(e) {
 const id = e.target.dataset.id;
 const item = items.find(item => item.id == id);
 
 item.quantity++;
 renderItems()
}

function removeItemListener(e) {
 const id = e.target.dataset.id;
 items = items.filter(item => item.id != id);

 renderItems();
}

renderItems();