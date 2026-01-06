<!--Footer Section-->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-box">
      <h3>British Bakery</h3>
      <p>Best Bakery in Karaikudi, Sivagangai.<br>
      Fresh cakes, snacks, juices & more served with love.</p>
      <div class="footer-icons">
        <i class="fas fa-map-marker-alt"></i>
        <i class="fas fa-phone-alt"></i>
        <i class="fas fa-envelope"></i>
      </div>
    </div>
<div class="footer-box">
      <h4>Special Items</h4>
      <ul class="items">
        <li>Fresh Cream Cakes</li>
        <li>Butter Cakes</li>
        <li>Sandwiches</li>
        <li>Pizza</li>
        <li>Fresh Fruit Juice</li>
        <li>Hot Drinks</li>
      </ul>
    </div>
    <div class="footer-box">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="#">About Bakery</a></li>
        <li><a href="#">Special Items</a></li>
        <li><a href="#">Order Online</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
    <div class="footer-box">
      <h4>Contact Us</h4>
      <p><i class="fas fa-map-marker-alt"></i> British Foods British Bakery, Kallukati North, 2nd Beet, Karaikudi</p>
      <p><i class="fas fa-map-marker-alt"></i> Opp to Anna Market, Sekkalai Road, Karaikudi</p>
      <p><i class="fas fa-phone-alt"></i> +91 9443268602</p>
      <p><i class="fas fa-envelope"></i> britishbakery@gmail.com</p>
    </div>
    <div class="footer-box">
      <h4>Opening Hours</h4>
      <p>Mon - Sun: 8.00 AM - 9.30 PM</p>
      <p>For delivery call: <strong>+91 9443268602</strong></p>
	  </div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 British Bakery. All Rights Reserved.</p>
  </div>
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

  const items = document.querySelectorAll('.left-anim, .right-anim, .fade-anim');
  if (!items.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
        obs.unobserve(entry.target); // animate only once
      }
    });
  }, {
    root: null,
    rootMargin: "0px 0px -10% 0px",
    threshold: 0
  });

  items.forEach(el => observer.observe(el));

});


const elements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
      }
    });
  }, { threshold: 0.2 });

  elements.forEach(el => observer.observe(el));
</script>



</body>
</html>
