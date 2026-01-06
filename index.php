
<?php include 'header.php'?>
<?php include 'navbar.php'?>

<!-- Carousel -->
<div id="customCarousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#customCarousel" data-slide-to="1"></li>
    <li data-target="#customCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="item active carousel-slide" style="background-image: url('images/bgimage.jpg');">
      <div class="container slide-content">
        <div class="row">
          <div class="col-sm-6 text-center fade-animate">
            <img src="images/demo1.png" class="carousel-img" alt="">
          </div>
          <div class="col-sm-6 slide-right fade-animate">
            <h2>Fresh & Delicious</h2>
            <p>From rich chocolate truffle to fluffy vanilla cream, our cakes are made fresh daily 
              using high-quality ingredients. Perfect for birthdays, celebrations and every sweet craving!</p>
            <a href="#" class="btn btn-lg slide-btn">Order Now</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="item carousel-slide" style="background-image: url('images/bgimage.jpg');">
      <div class="container slide-content">
        <div class="row">
          <div class="col-sm-6 slide-right fade-animate">
            <h2>Hot & Juicy Burgers with Crispy Fries</h2>
            <p>Taste the perfect combo of soft buns, loaded fillings, melting cheese, and crunchy fries—
              a treat for every fast-food lover!</p>
            <a href="#" class="btn btn-lg slide-btn">View Menu</a>
          </div>
          <div class="col-sm-6 text-center fade-animate">
            <img src="images/demo2.png" class="carousel-img" alt="">
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="item carousel-slide" style="background-image: url('images/bgimage.jpg');">
      <div class="container slide-content">
        <div class="row">
          <div class="col-sm-6 text-center fade-animate">
            <img src="images/demo3.png" class="carousel-img" alt="">
          </div>
          <div class="col-sm-6 slide-right fade-animate">
            <h2>Fresh Fruit Juices & Refreshing Drinks</h2>
            <p> Beat the heat with our 100% natural juices, thick shakes, mojitos and cool drinks –
              no preservatives, no artificial flavours, just pure freshness!</p>
            <a href="#" class="btn btn-lg slide-btn">Shop Now</a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <a class="left carousel-control" href="#customCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#customCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>

</div>


<!-- Specials Section -->
<section class="specials-section">
  <h3 class="section-title-bb">OUR SPECIAL FOODS</h3>
  <div class="specials-viewport">
    <div class="specials-track">
      <!-- Original items duplicated for loop -->
      <div class="special-card">
        <div class="card-media"><img src="images/cakes.jpg" alt=""></div>
        <div class="card-body">
          <div class="info"><h4>Cakes</h4><p>Delicious signature cakes</p></div>
          <div class="price">₹120</div>
        </div>
        <div class="card-footer"><button class="buy-btn">BUY NOW</button></div>
      </div>

      <div class="special-card">
        <div class="card-media"><img src="images/juices.jpg" alt=""></div>
        <div class="card-body">
          <div class="info"><h4>Juice</h4><p>Fresh cold-pressed juice</p></div>
          <div class="price">₹60</div>
        </div>
        <div class="card-footer"><button class="buy-btn">BUY NOW</button></div>
      </div>

      <div class="special-card">
        <div class="card-media"><img src="images/snacks.jpg" alt=""></div>
        <div class="card-body">
          <div class="info"><h4>Snacks</h4><p>Crispy savory snacks</p></div>
          <div class="price">₹50</div>
        </div>
        <div class="card-footer"><button class="buy-btn">BUY NOW</button></div>
      </div>

      <div class="special-card">
        <div class="card-media"><img src="images/chaat.jpg" alt=""></div>
        <div class="card-body">
          <div class="info"><h4>Chaat</h4><p>Spicy & tangy chaat</p></div>
          <div class="price">₹80</div>
        </div>
        <div class="card-footer"><button class="buy-btn">BUY NOW</button></div>
      </div>

      <div class="special-card">
        <div class="card-media"><img src="images/sweets.jpg" alt=""></div>
        <div class="card-body">
          <div class="info"><h4>Sweets</h4><p>Traditional sweets with ghee</p></div>
          <div class="price">₹100</div>
        </div>
        <div class="card-footer"><button class="buy-btn">BUY NOW</button></div>
      </div>

      <div class="special-card">
        <div class="card-media"><img src="images/snacks.jpg" alt=""></div>
        <div class="card-body">
          <div class="info"><h4>Snacks</h4><p>Crispy savory snacks</p></div>
          <div class="price">₹50</div>
        </div>
        <div class="card-footer"><button class="buy-btn">BUY NOW</button></div>
      </div>

      <!-- Duplicate for seamless scroll -->
      <div class="special-card">
        <div class="card-media"><img src="images/cakes.jpg" alt=""></div>
        <div class="card-body">
          <div class="info"><h4>Cakes</h4><p>Delicious signature cakes</p></div>
          <div class="price">₹120</div>
        </div>
        <div class="card-footer"><button class="buy-btn">BUY NOW</button></div>
      </div>
    </div>
  </div>
</section>
<section class="about-section">

  <div class="about-title">
    <h2>Food of The Gods, Freshly Baked!</h2>
    <p>Since 2004, we've been serving our guests the best quality treats,
    traditionally made and presented with care.</p>
  </div>

  <!-- ROW 1 -->
  <div class="about-row row-1">
    <div class="about-box left-anim">
      <h4>AUTHENTIC RECIPES</h4>
      <p>Our products are based on traditional home-style recipes using fresh ingredients.</p>
    </div>

    <div class="about-box right-anim">
      <h4>COMMITTED TO QUALITY</h4>
      <p>From ingredients to service, we always prioritize quality.</p>
    </div>
  </div>

  <!-- ROW 2 -->
  <div class="about-row row-2">
    <div class="about-box left-anim">
      <h4>BAKED WITH LOVE</h4>
      <p>Our passion for baking is poured into every recipe, serving smiles every day.</p>
    </div>

    <div class="about-center fade-anim">
      <img src="images/cake11.png" alt="Bakery Image" style="width:290px;height:290px;">

    </div>

    <div class="about-box right-anim">
      <h4>HONESTLY PRICED</h4>
      <p>We offer the best products at the right prices.</p>
    </div>
  </div>

</section>


<section class="categories-section">
  <h5 class="top-text">TOP FOODS</h5>
  <h2 class="main-title">Our Categories</h2>

  <div class="categories-container">


<div class="category-box">
      <img src="images/cake1.jpg" alt="Cake">
      <h4>Cake</h4>
    </div>
    <div class="category-box">
      <img src="images/cutlet.jpg" alt="Cake">
      <h4>Cutlet</h4>
    </div>
<div class="category-box">
      <img src="images/jillebi.jpg" alt="Cake">
      <h4>jillebi</h4>
    </div>
    <div class="category-box">
      <img src="images/popcorn.jpg" alt="popcorn">
      <h4>Pop corn</h4>
    </div>

    <div class="category-box">
      <img src="images/burger.jpg" alt="burger">
      <h4>Burger</h4>
    </div>

    <div class="category-box">
      <img src="images/chaat1.jpg" alt="Chaat">
      <h4>Chaat</h4>
    </div>

    <div class="category-box">
      <img src="images/drinks.jpg" alt="drink">
      <h4>Drinks</h4>
    </div>

    <div class="category-box">
      <img src="images/sandwitch.jpg" alt="Sandwiches">
      <h4>Sandwiches</h4>
    </div>

    <div class="category-box">
      <img src="images/fondant.jpg" alt="cake">
      <h4>Fondant Cake</h4>
    </div>

    <div class="category-box">
      <img src="images/fries.jpg" alt="fries">
      <h4>French Fries</h4>
    </div>

  </div>
</section>
<div class="quote-section">
  <div class="quote-box">

    <div class="quote-image reveal-left">
      <img src="images/redvelvet.jpg" alt="Bakery Image">
    </div>

    <div class="quote-text reveal-right" >
      <h2>About Us</h2>
      <p>British Bakery is more than just a bakery — it is a place where flavour, freshness, and tradition come together. Since our beginning, we have been committed to serving delicious and high-quality baked goods that bring joy to every customer who walks through our doors.</p>

      <p>Every product we create is made with premium ingredients, time-tested recipes, and a passion for perfection. From soft and fluffy breads to rich creamy cakes, from crispy snacks to traditional Indian sweets.</p>

      <p>At British Bakery, our goal is not just to bake food, but to bake memories — one slice, one smile, one celebration at a time.</p>

      <a href="#" class="read-more-btn">Read More</a>

    </div>

  </div>
</div>
<!-- Services Section -->
<section class="service-area-bb">
  <h5 class="service-heading-bb">OUR SERVICES</h5>

  <div class="service-wrapper-bb">

    <div class="service-card-bb">
      <div class="service-icon-bb"><i class="fas fa-user-tie"></i></div>
      <h4>Master Chefs</h4>
      <p>Crafting delightful bakery creations with passion, precision, love, and a dash of creativity.</p>
    </div>

    <div class="service-card-bb">
      <div class="service-icon-bb"><i class="fas fa-utensils"></i></div>
      <h4>Quality Food</h4>
      <p>Delighting your taste buds with freshly baked, premium treats made from the finest ingredients.</p>
    </div>

    <div class="service-card-bb">
      <div class="service-icon-bb"><i class="fas fa-shopping-cart"></i></div>
      <h4>Online Order</h4>
      <p>Satisfy your sweet cravings with our freshly baked delights, delivered right to your door, anytime!</p>
    </div>

    <div class="service-card-bb">
      <div class="service-icon-bb"><i class="fas fa-headset"></i></div>
      <h4>24/7 Service</h4>
      <p>Freshly baked delights delivered to your doorstep, anytime, because cravings don't follow a clock!</p>
    </div>

  </div>
</section>

<?php include 'footer.php'?>
