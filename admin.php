<?php 
require_once 'components/header.php';
echo '<body>';
require_once 'components/navbar.php';
require_once 'Database/AppointmentDatabase.php';

$appointmentDb = new AppointmentDatabase();
$bookings = $appointmentDb->readAppointments();
?>

<body>
  <div class="admin_page">
  <div class="admin_content">

  <?php 
    foreach($bookings as $booking){
      ?>
      <div class="appointment_card">
       
      <div class="row">
        <h2>Patient Name: </h2>
        <a href="delete.php?id=<?php echo $booking['appointmentId']?>" class=" delete_button button">
          <span class="material-symbols-outlined"  >
          close
          </span>
      </a>
      </div>
      <h2> <?php echo $booking['patientName'] ?></h2>
      <h3>Patient Email: </h3><p></h2><?php echo $booking['patientEmail'] ?></p>
      <h3>Appointment Date:</h3><p> <?php echo $booking['appointmentDate'] ?></p>
      <h3>Appointment Time:</h3><p> <?php echo $booking['appointmentTime'] ?></p>
      <h3>Appointment Purpose: </h3><p><?php echo $booking['appointmentPurpose'] ?></p>
      <a href="update_page.php?id=<?php echo $booking['appointmentId']?>"class="update_button button ">Update</a>
      </div>


  <?php
    }
  ?>
  </div>
  </div>
  
  <?php 
  require_once 'components/footer.php';
  ?>

</body>