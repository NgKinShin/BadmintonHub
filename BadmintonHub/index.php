<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Badminton Hub</title>

<!-- Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css?v=16">

</head>

<body>
<script>
    // This script ensures you are always on the correct XAMPP server
    if (window.location.protocol === 'file:' || window.location.hostname === '127.0.0.1') {
        alert("Redirecting you to the correct XAMPP server so PHP will work!");
        window.location.href = "http://localhost/BadmintonStore/index.php";
    }
</script>

<style>
    .admin-footer-link {
        display: inline-block;
        background-color: #333;
        color: white !important;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
        font-family: sans-serif;
        font-size: 12px;
        transition: 0.3s;
    }

    .admin-footer-link:hover {
        background-color: #555;
    }
</style>
<!-- HEADER -->

<header>

  <div class="logo">Badminton Hub</div>

  <nav>
    <a href="#rackets">Rackets</a>
    <a href="#shuttlecocks">Shuttlecocks</a>
    <a href="#shoes">Shoes</a>
  </nav>

  <div style="display: flex; gap: 15px; align-items: center;">
    <button id="theme-toggle" class="theme-toggle">🌙</button>
    <div class="cart-icon" id="cart-icon">
    🛒 <span id="cart-count">0</span>
    </div>
  </div>

</header>

<!-- HERO -->

<section class="hero">

  <div class="container">
    <video autoplay loop muted plays-inline class="background-clip">
      <source src="vid/LeeZiJia.mp4" type="video/mp4">
    </video>
  </div>

  <div class="hero-content animate-fade-up">
    <h1>Play Like a <span>Champion</span></h1>

    <p>
      Premium badminton rackets, shoes and shuttlecocks
      designed for speed, power and precision.
    </p>

    <a href="#rackets" class="hero-btn">Shop Now</a>
  </div>

</section>

<!-- RACKETS -->

<section class="section" id="rackets">

  <h2 class="section-title slide-hidden slide-left">Best Rackets</h2>

  <div class="products">

    <div class="card slide-hidden">
      <img src="./img/Racket/leechongwei.png">
      <div class="card-content">
        <h3>Yonex Z-Force II</h3>
        <p class="price">RM629</p>
        <a href="#" class="btn add-to-cart"
          data-name="Yonex Z-Force II"
          data-price="629">
          Buy Now
        </a>
      </div>
    </div>

    <div class="card slide-hidden">
      <img src="./img/Racket/leezijia.png">
      <div class="card-content">
        <h3>Yonex Astrox 100 ZZ</h3>
        <p class="price">RM849</p>
        <a href="#" class="btn add-to-cart"
          data-name="Yonex Astrox 100 ZZ"
          data-price="849">
          Buy Now
        </a>
      </div>
    </div>

    <div class="card slide-hidden">
      <img src="./img/Racket/NANOFLARE 800 PRO.png">
      <div class="card-content">
        <h3>Nanoflare 800 Pro</h3>
        <p class="price">RM999</p>  
        <a href="#" class="btn add-to-cart"
          data-name="Nanoflare 800 Pro"
          data-price="999">
          Buy Now
        </a>
      </div>
    </div>

    <div class="card slide-hidden">
      <img src="./img/Racket/YONEX ASTROX 99 PRO.png">
      <div class="card-content">
        <h3>Yonex Astrox 99 Pro</h3>
        <p class="price">RM899</p>
        <a href="#" class="btn add-to-cart"
          data-name="Yonex Astrox 99 Pro"
          data-price="899">
          Buy Now
          </a>
      </div>
    </div>

  </div>

</section>

<!-- SHUTTLECOCKS -->

<section class="section" id="shuttlecocks">

  <h2 class="section-title slide-hidden slide-right">Premium Shuttlecocks</h2>

  <div class="products">

    <div class="card slide-hidden">
      <img src="./img/Shuttlecock/yellow.png">
      <div class="card-content">
        <h3>Training Shuttlecock</h3>
        <p class="price">RM15</p>
        <a href="#" class="btn add-to-cart"
          data-name="Training Shuttlecock"
          data-price="15">
          Buy Now
        </a>
      </div>
    </div>

    <div class="card slide-hidden">
      <img src="./img/Shuttlecock/white.png">
      <div class="card-content">
        <h3>Professional Shuttlecock</h3>
        <p class="price">RM60</p>
        <a href="#" class="btn add-to-cart"
          data-name="Professional Shuttlecock"
          data-price="60">
          Buy Now
        </a>
      </div>
    </div>

  </div>

</section>

<!-- SHOES -->

<section class="section" id="shoes">

  <h2 class="section-title slide-hidden slide-left">Top Shoes</h2>

  <div class="products">

    <div class="card slide-hidden">
      <img src="./img/Shoe/yonex shoes white.webp" class="large-shoe">
      <div class="card-content">
        <h3>Yonex Subaxia GT</h3>
        <p class="price">RM669</p>
        <a href="#" class="btn add-to-cart"
          data-name="Yonex Subaxia GT"
          data-price="699">
          Buy Now
        </a>
      </div>
    </div>

    <div class="card slide-hidden">
      <img src="./img/Shoe/yonex shoes black.png">
      <div class="card-content">
        <h3>Yonex SC6 LDEX</h3>
        <p class="price">RM779</p>
        <a href="#" class="btn add-to-cart"
           data-name="Yonex SC6 LDEX"
          data-price="779">
          Buy Now
        </a>
      </div>
    </div>

    <div class="card slide-hidden">
      <img src="./img/Shoe/yonex shoes grey.png">
      <div class="card-content">
        <h3>Yonex SHB-03 </h3>
        <p class="price">RM599</p>
        <a href="#" class="btn add-to-cart"
          data-name="Yonex SHB-03"
          data-price="599">
          Buy Now
        </a>
      </div>
    </div>

    <div class="card slide-hidden">
      <img src="./img/Shoe/yonex shoes pink.jpg">
      <div class="card-content">
        <h3>Yonex SHB-01 LTD</h3>
        <p class="price">RM499</p>
        <a href="#" class="btn add-to-cart"
          data-name="Yonex SHB-01 LTD"
          data-price="499">
          Buy Now
        </a>
      </div>
    </div>

  </div>

</section>

<footer>
  <p>© 2026 Badminton Hub. All Rights Reserved.</p>
  <a href="admin.php" class="admin-footer-link" style="margin-top: 10px;">Admin Dashboard</a>
</footer>

<!-- SHOPPING CART -->

<div class="cart" id="cart">

  <div class="cart-header">
    <h2>Your Cart</h2>
    <button id="close-cart">✖</button>
  </div>

  <div class="cart-items" id="cart-items">
    <p>Your cart is empty.</p>
  </div>

  <div class="cart-footer">
    <h3>Total: RM<span id="cart-total">0</span></h3>

    <form action="checkout.php" method="POST" style="width: 100%;">
      <input type="text" name="name" placeholder="Name" required style="width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;">
      <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;">
      <input type="text" name="phone" placeholder="Phone Number" required style="width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;">
      <input type="text" name="address" placeholder="Address" required style="width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;">
      <input type="text" name="card_number" placeholder="Card Number" required style="width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;">
      <div style="display: flex; gap: 10px;">
        <input type="text" name="expiry_month" placeholder="MM" required maxlength="2" style="width: 50%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;">
        <input type="text" name="expiry_year" placeholder="YY" required maxlength="2" style="width: 50%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;">
      </div>
      <input type="hidden" name="total" id="checkout-total" value="0">
      <button type="submit" class="checkout-btn" style="width: 100%; margin-top: 10px;">Proceed to Checkout</button>
    </form>
  </div>

</div>

<script src="app.js?v=4"></script>

</body>
</html>
