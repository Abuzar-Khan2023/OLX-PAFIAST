<!-- navbar.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>OLX PAF-IAST | Nav-bar</title>
</head>
<body>
    <header>
        <div class="nav-bar">
            <a href="" class="logo"><h1>OLX PAF-IAST</h1></a>
                <ul class="nav-links">
                    <li><a href="/index.html">Shop</a></li>
                    <li><a href="">Newstand</a></li>
                    <li><a href="/index.html#about">Who we are</a></li>
                    <li><a href="/src/HTML/profile.html">My profile</a></li>
                    <li><a href="/index.html#contact">Contact</a></li>
                    <li><a href="/src/PHP/login.html">Login</a></li>
                    <li><a href="/src/PHP/signup.html">Signup</a></li>
                </ul>

                <button class="cart-btn">
                    <i class="fa fa-shopping-basket"></i>
                    <a href="/src/HTML/cart.html" style="text-decoration: none; color: black;">Basket</a>
                </button>
        </div>

    
        <div class="nav2">
            <div class="produce">Produce</div>

                <div class="toggle-icon" onclick="toggleMenu()">
                    <span class="open-icon">&#9776;</span>
                    <span class="close-icon">&times;</span>
                </div>

            <div class="withProduce">
                <p class="fresh">Fresh —</p>
                <p class="date">&nbsp; &nbsp; August 15, 2024</p>
            </div>
    
            <div class="btns">
                <div class="btn btn1">Default</div>
                <div class="btn btn2">A - Z</div>
                <div class="btn btn3">List view</div>
            </div>
        </div>        
    
        <hr class="line">
    </header>

    <script>
        function toggleMenu() {
        const navbar = document.querySelector('.nav2');
        navbar.classList.toggle('active');

        const toggleIcon = document.querySelector('.toggle-icon');
        toggleIcon.classList.toggle('active');
    }
    </script>
    
</body>
</html>