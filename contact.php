<?php 
  require_once 'components/header.php';
  echo '<body>';
  require_once 'components/navbar.php';
  ?>  
  <body>
  <div class="page">
    <div class="contact_container">
      <h1>Contact Hope Health Clinic</h1>

      <p>Thank you for considering Hope Health Clinic for your healthcare needs. We are here to assist you. Please feel free to reach out to us using the contact information below:</p>

      <h2>Contact Information</h2>
      <ul>
          <li><strong>Address:</strong> 123 Main Street, Your City, State ZIP Code</li>
          <li><strong>Phone:</strong> (123) 456-7890</li>
          <li><strong>Email:</strong> info@hopehealthclinic.com</li>
      </ul>

      <h2>Office Hours</h2>
      <p>Our clinic is open to serve you during the following hours:</p>
      <ul>
          <li>Monday to Friday: 8:00 AM - 6:00 PM</li>
          <li>Saturday: 9:00 AM - 2:00 PM</li>
          <li>Sunday: Closed</li>
      </ul>

      <h2>Contact Form</h2>
      <p>If you prefer, you can also contact us by filling out the form below. We'll get back to you as soon as possible.</p>
      <form action="process_contact_form.php" method="post">
          <label for="name">Your Name:</label>
          <input type="text" id="name" name="name" required>
          <br>

          <label for="email">Your Email:</label>
          <input type="email" id="email" name="email" required>
          <br>

          <label for="message">Your Message:</label>
          <textarea id="message" name="message" rows="4" required></textarea>
          <br>

          <input type="submit" value="Submit">
      </form>
    </div>
  </div>


  <?php 

  require_once 'components/footer.php';
  ?>
  </body>