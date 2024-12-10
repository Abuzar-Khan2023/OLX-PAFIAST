// Sample product data
const products = [
    { id: 1, name: "Set", price: 99, image: "/olx-pafiast/image/mouse-ph-pod.jpg" },
    { id: 2, name: "Mouse", price: 4.5, image: "/olx-pafiast/image/mouse.jpg" },
    { id: 3, name: "Keyboard", price: 24, image: "/olx-pafiast/image/wireless-keyboard.jpg" },
    { id: 4, name: "Earpod", price: 19, image: "/olx-pafiast/image/earpod.jpg" },
    { id: 5, name: "IPhone 12", price: 395, image: "/olx-pafiast/image/iphone.jpg" },
];

let cart = JSON.parse(localStorage.getItem("cart")) || [];

// Function to render products
function renderProducts() {
    const productList = document.getElementById("product-list");
    productList.innerHTML = ""; // Clear previous content
    products.forEach((product) => {
        const productHTML = `
            <div class="box">
                <div class="product" style="background-image: url('${product.image}');"></div>
                <div class="detail">
                    <p class="name">${product.name}</p>
                    <p class="price">$${product.price}</p>
                    <div class="addToBasket" onclick="addToCart(${product.id})">
                        <button>Add to Cart</button>
                    </div>
                </div>
            </div>
        `;
        productList.innerHTML += productHTML;
    });
}

// Function to show notification popup
function showNotification(message) {
    const popup = document.getElementById("popup-notification");
    popup.innerText = message;
    popup.classList.add("show");

    setTimeout(() => {
        popup.classList.remove("show");
    }, 1500);
}

// Function to update cart count
function updateCartCount() {
    const cartCount = document.getElementById("cart-count");
    cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);
}

// Function to add product to cart
function addToCart(productId) {
    const product = products.find((item) => item.id === productId);
    const existingItem = cart.find((item) => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    showNotification("Product added to cart!");
    updateCartCount();
}

// Function to navigate to cart page
function goToCart() {
    window.location.href = "cart.html";
}

// Function to render cart items on cart.html
function renderCart() {
    const cartItems = document.getElementById("cart-items");
    const subtotalElement = document.getElementById("subtotal");
    const totalElement = document.getElementById("total");
    let subtotal = 0;

    cartItems.innerHTML = ""; // Clear cart container
    cart.forEach((item) => {
        subtotal += item.price * item.quantity;

        const cartItemHTML = `
            <div class="product1">
                <div class="details">
                    <p class="name">${item.name}</p>
                    <p class="price" style="color: green;">$${item.price}</p>
                    <p>Quantity: ${item.quantity}</p>
                </div>
                <button onclick="removeFromCart(${item.id})">Remove</button>
            </div>
        `;
        cartItems.innerHTML += cartItemHTML;
    });

    subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
    totalElement.textContent = `$${subtotal.toFixed(2)}`;
}

// Function to remove items from cart
function removeFromCart(productId) {
    cart = cart.filter((item) => item.id !== productId);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
    updateCartCount();
}

// Initialize on page load
if (document.getElementById("product-list")) {
    renderProducts();
    updateCartCount();
}
if (document.getElementById("cart-items")) renderCart();
