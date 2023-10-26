<?php 
  require_once 'components/header.php';
  echo '<body>';
  require_once 'components/navbar.php';
  
  ?>  
  <div class="booking_page">
    
      <form action="booking_page.php" method='POST' class='booking_form'>
        <h2>Book Appointment</h2>
        <label>Name:</label>
        <input type="text" name='name'>
        <label>Choose Schedule</label>
        <select id="appointment-time" name="appointment-time">
          <option value="08:00 AM">8:00 AM</option>
          <option value="09:00 AM">9:00 AM</option>
          <option value="10:00 AM">10:00 AM</option>
          <option value="11:00 AM">11:00 AM</option>
          <option value="12:00 PM">12:00 PM</option>
          <option value="01:00 PM">1:00 PM</option>
          <option value="02:00 PM">2:00 PM</option>
          <option value="03:00 PM">3:00 PM</option>
          <option value="04:00 PM">4:00 PM</option>
          <option value="05:00 PM">5:00 PM</option>
          <option value="06:00 PM">6:00 PM</option>
      </select>
        <input type="date" id="appointment-date" name="appointment-date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+7 days')); ?>">
        <button class='book_button'>Add Appointment</button>
      </form>

    
  </div>

  <?php 

  require_once 'components/footer.php';
  ?>
  </body>
