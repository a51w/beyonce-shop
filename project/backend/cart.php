<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home - BEYONCE Shop</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
 

  <style>
    :root {
      --main-color: #0052cc;
      --accent-color: #ffdd57;
      --bg-color: #f4f7fb;
      --card-bg: #ffffff;
      --text-color: #111827;
      --font: 'Inter', sans-serif;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: var(--font);
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
      line-height: 1.6;
    }

    header {
      background-color: var(--main-color);
      color: white;
      padding: 25px 20px;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      position: relative;
    }

    header h1 {
      font-size: 28px;
      font-weight: 700;
    }

    nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      padding: 15px 0;
      background-color: white;
      box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
      margin-bottom: 30px;
      border-bottom: 2px solid var(--main-color);
    }

    nav ul li {
      margin: 0 15px;
      position: relative;
    }

    nav ul li a {
      color: var(--main-color);
      text-decoration: none;
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 6px;
      transition: background-color 0.3s;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    nav ul li a:hover {
      background-color: var(--main-color);
      color: white;
    }

    .cart-count {
      position: absolute;
      top: -8px;
      right: -8px;
      background-color: var(--accent-color);
      color: var(--text-color);
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: bold;
    }

    .hero {
      background: url('../assets/fashion-header.jpg') center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 120px 20px;
      position: relative;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      position: relative;
      z-index: 1;
    }

    .hero h2 {
      font-size: 48px;
      margin: 0 0 10px;
      text-transform: uppercase;
      letter-spacing: 3px;
    }

    .hero p {
      font-size: 18px;
      margin: 10px 0 20px;
    }

    .hero button {
      background: #ff5500;
      color: #111;
      padding: 12px 30px;
      border: none;
      font-weight: 600;
      border-radius: 30px;
      cursor: pointer;
      transition: background 0.3s ease;
      font-size: 14px;
    }

    .hero button:hover {
      background: #e6b800;
    }

    /* ส่วนเกี่ยวกับร้านค้า */
    .about-section {
      padding: 60px 40px;
      max-width: 1200px;
      margin: auto;
      text-align: center;
    }

    .about-section h2 {
      font-size: 36px;
      color: var(--text-color);
      margin-bottom: 20px;
    }

    .about-section p {
      font-size: 18px;
      color: #555;
      max-width: 800px;
      margin: 0 auto 30px;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      margin-top: 40px;
    }

    .feature {
      background: var(--card-bg);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .feature i {
      font-size: 40px;
      color: var(--main-color);
      margin-bottom: 20px;
    }

    .feature h3 {
      margin-bottom: 15px;
      color: var(--text-color);
    }

    /* ส่วนโปรโมชั่น */
    .promo-section {
      background-color: var(--main-color);
      color: white;
      padding: 60px 20px;
      text-align: center;
    }

    .promo-section h2 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .promo-section p {
      font-size: 18px;
      max-width: 800px;
      margin: 0 auto 30px;
    }

    .promo-timer {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    /* ส่วนแบรนด์ */
    .brands-section {
      padding: 60px 20px;
      max-width: 1200px;
      margin: auto;
      text-align: center;
    }

    .brands-section h2 {
      font-size: 36px;
      color: var(--text-color);
      margin-bottom: 40px;
    }

    .brands {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
      align-items: center;
    }

    .brands img {
      height: 60px;
      filter: grayscale(100%);
      opacity: 0.7;
      transition: all 0.3s ease;
    }

    .brands img:hover {
      filter: grayscale(0%);
      opacity: 1;
    }

    #products {
      padding: 60px 40px;
      max-width: 1200px;
      margin: auto;
    }

    #products h2 {
      font-size: 36px;
      text-align: center;
      color: #111;
      margin-bottom: 40px;
      letter-spacing: 1px;
    }

    .product-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 30px;
    }

    .product {
      background: #fff;
      border: 1px solid #eee;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .product img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .product-content {
      padding: 15px;
    }

    .product h3 {
      margin: 0 0 5px;
      font-size: 18px;
      color: #111;
    }

    .product p {
      font-size: 14px;
      color: #666;
      margin-bottom: 10px;
      min-height: 40px;
    }

    .price {
      font-size: 16px;
      color: #ff6600;
      font-weight: bold;
      margin-bottom: 12px;
      display: block;
    }

    .original-price {
      text-decoration: line-through;
      color: #999;
      font-size: 14px;
      margin-right: 8px;
    }

    button {
      background-color: #1100ff;
      color: white;
      border: none;
      padding: 10px 22px;
      border-radius: 20px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0a00b3;
    }

    .btn-outline {
      background-color: transparent;
      border: 2px solid #1100ff;
      color: #1100ff;
    }

    .btn-outline:hover {
      background-color: #1100ff;
      color: white;
    }

    footer {
      background: #111827;
      color: #eee;
      padding: 40px 0 24px;
      margin-top: 60px;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      padding: 0 20px;
    }

    .footer-column h3 {
      color: white;
      margin-bottom: 20px;
      font-size: 18px;
    }

    .footer-column ul {
      list-style: none;
    }

    .footer-column ul li {
      margin-bottom: 10px;
    }

    .footer-column ul li a {
      color: #ccc;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-column ul li a:hover {
      color: white;
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-links a {
      color: white;
      font-size: 20px;
      transition: color 0.3s;
    }

    .social-links a:hover {
      color: var(--accent-color);
    }

    .copyright {
      text-align: center;
      padding-top: 30px;
      margin-top: 30px;
      border-top: 1px solid #333;
      font-size: 14px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hero h2 {
        font-size: 36px;
      }
      
      nav ul {
        flex-direction: column;
        align-items: center;
      }
      
      nav ul li {
        margin: 5px 0;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>Welcome to BEYONCE Shop</h1>
  </header>

  <nav>
  <ul>
    <li><a href="index_user.html"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="cart.html"><i class="fas fa-shopping-cart"></i> Cart</a></li>
    <li><a href="account.html"><i class="fas fa-user-circle"></i> My Account</a></li>
    <li><a href="index.html" onclick="return logoutConfirm();">Log out</a></li>
  </ul>
</nav>
  
  <script>
    function logoutConfirm() {
      alert("Thank you for visiting BEYONCE Shop. See you again soon! 🛍️");
      return true; // ดำเนินการไปยัง index.html
    }

    
  </script>
  

  <section class="hero">
    <div class="hero-content">
      <h2>Summer Collection 2025</h2>
      <p>Discover the latest trends with exclusive styles</p>
      <button id="shopNowBtn">Shop Now</button>
    </div>
  </section>

  <script>
    document.getElementById("shopNowBtn").addEventListener("click", function () {
      const targetSection = document.getElementById("products");
      if (targetSection) {
        targetSection.scrollIntoView({ behavior: "smooth" });
      }
    });
  </script>

  <!-- About the Shop Section -->
  <section class="about-section">
    <h2>About BEYONCE Shop</h2>
    <p>BEYONCE Shop is an online fashion store focused on delivering trendy, stylish, and high-quality apparel at fair prices.</p>
    
    <div class="features">
      <div class="feature">
        <i class="fas fa-truck"></i>
        <h3>Fast Delivery</h3>
        <p>Nationwide express delivery within 1–3 business days.</p>
      </div>
      <div class="feature">
        <i class="fas fa-exchange-alt"></i>
        <h3>Easy Returns</h3>
        <p>Return and exchange policy within 30 days.</p>
      </div>
      <div class="feature">
        <i class="fas fa-shield-alt"></i>
        <h3>Secure Payment</h3>
        <p>Safe payment system with international standards.</p>
      </div>
      <div class="feature">
        <i class="fas fa-headset"></i>
        <h3>Customer Service</h3>
        <p>Our team is available daily from 09:00–18:00.</p>
      </div>
    </div>
  </section>
  
  <!-- Promotions Section -->
  <section class="promo-section">
    <h2>Special Promotions!</h2>
    <button class=".btn-outline-view">View All Promotions</button>
  </section>
  
  <!-- Recommended Products Section -->
 
<section id="products">
  <h2>Recommended Products</h2>
  <div class="product-list">
    <div class="product">
      <img src="assets/black-T.jpg" alt="Classic Tee">
      <div class="product-content">
        <h3>Classic Tee</h3>
        <p>Soft cotton, oversized fit, perfect for everyday wear.</p>
        <span class="price"><span class="original-price">฿650</span> ฿500</span>
        <button onclick="addToCart('Classic Tee', 500, 'assets/black-T.jpg')">Add to Cart</button>
      </div>
    </div>

       <div class="product">
      <img src="assets/Denim-Jacket.jpg" alt="Denim Jacket">
      <div class="product-content">
        <h3>Denim Jacket</h3>
        <p>Stylish and timeless. Must-have for your wardrobe.</p>
        <span class="price">฿750</span>
        <button onclick="addToCart('Denim Jacket', 750, 'assets/Denim-Jacket.jpg')">Add to Cart</button>
      </div>
    </div>

      <div class="product">
      <img src="assets/Mini-Dress.jpg" alt="Mini Dress">
      <div class="product-content">
        <h3>Mini Dress</h3>
        <p>Elegant silhouette, perfect for both day and night.</p>
        <span class="price"><span class="original-price">฿1500</span> ฿1200</span>
        <button onclick="addToCart('Mini Dress', 1200, 'assets/Mini-Dress.jpg')">Add to Cart</button>
      </div>
    </div>

      <div class="product">
      <img src="assets/Comfy-Hoodie.jpg" alt="Comfy Hoodie">
      <div class="product-content">
        <h3>Comfy Hoodie</h3>
        <p>Relaxed fit, ultra-soft fleece interior for cozy days.</p>
        <span class="price">฿950</span>
        <button onclick="addToCart('Comfy Hoodie', 950, 'assets/Comfy-Hoodie.jpg')">Add to Cart</button>
      </div>
    </div>
  </div>
</section>
  
  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-column">
        <h3>About Us</h3>
        <p>BEYONCE Shop is an online fashion store focused on offering stylish and up-to-date clothing and accessories.</p>
      </div>
      <div class="footer-column">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="product_management.html">All Products</a></li>
          <li><a href="#">Promotions</a></li>
          <li><a href="review.html">Customer Reviews</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Customer Service</h3>
        <ul>
          <li><a href="#">Purchase Policy</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Contact Information</h3>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i> 123 Fashion Road, Bangkok</li>
          <li><i class="fas fa-phone"></i> 02-123-4567</li>
          <li><i class="fas fa-envelope"></i> support@beyonce-shop.com</li>
          <li><i class="fas fa-clock"></i> Mon–Fri 09:00–18:00</li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      <p>© 2025 BEYONCE Clothing. All rights reserved.</p>
    </div>
  </footer>

  <script>
  function logoutConfirm() {
    alert("Thank you for visiting BEYONCE Shop. See you again soon! 🛍️");
    return true;
  }

  function addToCart(name, price, image) {
    let cart = JSON.parse(localStorage.getItem('beyonceShopCart')) || [];
    const existing = cart.find(item => item.name === name);
    if (existing) {
      existing.quantity += 1;
    } else {
      cart.push({ name, price, image, quantity: 1 });
    }
    localStorage.setItem('beyonceShopCart', JSON.stringify(cart));
    alert(name + ' ถูกเพิ่มลงในตะกร้าแล้ว');
  }
</script>
</body>
</html>