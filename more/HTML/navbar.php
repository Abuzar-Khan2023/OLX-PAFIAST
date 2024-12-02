<!-- navbar.php -->
<header>
    <div class="nav-bar">
        <a href=""><h1 class="logo">OLX PAF-IAST</h1></a>
        <ul class="nav-links">
            <li><a href="">Shop</a></li>
            <li><a href="">Newstand</a></li>
            <li><a href="">Who we are</a></li> 
            <li><a href="">My profile</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <button>
            <i class="fa fa-shopping-basket"></i>
            <a href="/more/HTML/cart.html" style="text-decoration: none; color: black;">
                Basket
        </button>

        <div class="toggle-icon">
            <span class="open-icon">&#9776;</span>
            <span class="close-icon">&times;</span>
        </div>
    </div>
    
    <div class="nav2">
        <div class="produce">Produce</div>
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
        const toggleIcon = document.querySelector('.toggle-icon');
        const navBar = document.querySelector('.nav-bar');
        const openIcon = document.querySelector('.open-icon');
        const closeIcon = document.querySelector('.close-icon');

        toggleIcon.addEventListener('click', () => {
            navBar.classList.toggle('active');
            openIcon.style.display = openIcon.style.display === 'none' ? 'inline' : 'none';
            closeIcon.style.display = closeIcon.style.display === 'none' ? 'inline' : 'none';
        });

    </script>