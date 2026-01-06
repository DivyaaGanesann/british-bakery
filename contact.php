<?php include 'header.php'?>
<?php include 'navbar.php'?>
<section class="about-hero">
  <div class="overlay"></div>
  <div class="about-text">
    <h1>Contact Us</h1>
  </div>
</section>
<section id="contact-section">
  <div class="container">
    <div class="row text-center">
      <h2 class="contact-title">We’d love to hear from you</h2>
      <p class="contact-subtitle">
        Whether it's a feedback, suggestion, order, complaint, or just want to say <strong>"Hi"</strong>.<br>
        Fill the form below and we will get back to you soon.
      </p>
    </div>
    <div class="row" style="margin-top:40px;">
      <div class="col-md-6">
        <form class="contact-form">
          <div class="form-group"><label><i class="glyphicon glyphicon-user"></i> Your Name</label><input type="text" class="form-control" placeholder="Enter your name" required></div>
          <div class="form-group"><label><i class="glyphicon glyphicon-envelope"></i> Your Email</label><input type="email" class="form-control" placeholder="Enter your email" required></div>
          <div class="form-group"><label><i class="glyphicon glyphicon-earphone"></i> Phone Number</label><input type="text" class="form-control" placeholder="Enter phone number (optional)"></div>
          <div class="form-group"><label><i class="glyphicon glyphicon-comment"></i> Message</label><textarea class="form-control" rows="5" placeholder="Write your message here..." required></textarea></div>
          <button type="submit" class="btn contact-btn">Send Message</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class="contact-img-box">
          <img src="images/bakery-contact.jpg" alt="Bakery Image">
        </div>
      </div>
    </div>
  </div>
</section>
<section id="info-cards1">
  <div class="container">
    <div class="row text-center">
      <h2 class="contactt-title">Get in Touch With Us</h2>
      <p class="contactt-subtitle">Reach us anytime — we are happy to assist you!</p>
    </div>
    <div class="row" style="margin-top:40px;">

      <div class="col-sm-4">
        <div class="info-card1">
          <div class="icon-box1"><i class="fa fa-phone"></i></div>
          <h4>Call Us</h4>
          <p>+91 98765 43210<br>Available 9AM - 9PM</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="info-card1">
          <div class="icon-box1"><i class="fa fa-envelope"></i></div>
          <h4>Email Us</h4>
          <p>britishbakery@gmail.com<br>We reply within 24 hrs</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="info-card1">
          <div class="icon-box1"><i class="fa fa-map-marker"></i></div>
          <h4>Visit Us</h4>
          <p>British Bakery, Karaikudi<br>Sivaganga District, TN</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="map-section">
  <div class="container">
    <div class="row text-center">
      <h2 class="contact-title">Find Us on the Map</h2>
      <p class="contact-subtitle">Easily locate British Bakery in Karaikudi</p>
    </div>
  </div>
  <div class="map-box">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7856.764547681282!2d78.765839!3d10.067730000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00675f5f1d8921%3A0x7df6206a6c597dda!2sBritish%20Bakery!5e0!3m2!1sen!2sus!4v1762162887399!5m2!1sen!2sus"
      width="100%" 
      height="450" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>
<?php include 'footer.php'?>