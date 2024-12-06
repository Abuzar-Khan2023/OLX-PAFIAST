// Sample product data
const products = [
    { id: 1, name: "Set", price: 99, image: "/image/mouse-ph-pod.jp" },
    { id: 2, name: "Mouse", price: 4.5, image: "/image/mouse.jpg" },
    { id: 3, name: "Keyboard", price: 24, image: "/image/wireless-keyboard.jpg" },
    { id: 4, name: "Earpod", price: 19, image: "/image/earpod.jpg" },
    { id: 5, name: "IPhone 12", price: 395, image: "/image/iphone.jpg" },
    // Add the remaining products similarly
];

let cart = JSON.parse(localStorage.getItem("cart")) || [];

// Function to render products on the product page
function renderProducts() {
    const productList = document.getElementById("product-list");
    products.forEach((product) => {
        const productHTML = `
            <div class="box">
                <div class="product" style="background-image: url('${product.image}');"></div>
                <div class="detail">
                    <p class="name">${product.name}</p>
                    <p class="price">$${product.price}</p>
                    <div class="addToBasket" onclick="addToCart(${product.id})">
                        <p>Add to Basket</p>
                    </div>
                </div>
            </div>
        `;
        productList.innerHTML += productHTML;
    });
}

// Function to add product to the cart
function addToCart(productId) {
    const product = products.find((item) => item.id === productId);
    const existingItem = cart.find((item) => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    window.location.href = "/HTML/cart.html";
}

// Function to render cart items
function renderCart() {
    const cartItems = document.getElementById("cart-items");
    const subtotalElement = document.getElementById("subtotal");
    const totalElement = document.getElementById("total");
    cartItems.innerHTML = "";
    let subtotal = 0;

    cart.forEach((item) => {
        subtotal += item.price * item.quantity;
        const cartItemHTML = `
            <div class="product1">
                <div class="remove" onclick="removeFromCart(${item.id})">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="details">
                    <p class="name">${item.name}</p>
                    <p class="price" style="color: green;">$${item.price}</p>
                </div>
                <div class="quantity">
                    <i class="fa-solid fa-minus" onclick="updateQuantity(${item.id}, -1)"></i>
                    <input type="number" value="${item.quantity}" readonly />
                    <i class="fa-solid fa-plus" onclick="updateQuantity(${item.id}, 1)"></i>
                </div>
            </div>
        `;
        cartItems.innerHTML += cartItemHTML;
    });

    subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
    totalElement.textContent = `$${subtotal.toFixed(2)}`;
}

// Function to remove an item from the cart
function removeFromCart(productId) {
    cart = cart.filter((item) => item.id !== productId);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

// Function to update quantity
function updateQuantity(productId, change) {
    const item = cart.find((item) => item.id === productId);
    if (item) {
        item.quantity = Math.max(1, item.quantity + change); // Minimum quantity is 1
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

// Initialize pages
if (document.getElementById("product-list")) renderProducts();
if (document.getElementById("cart-container")) renderCart();
