<?php 
require_once 'components/header.php';
echo '<body>';
require_once 'components/navbar.php';
require_once 'Database/AppointmentDatabase.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){

  $id = $_GET['id'];
  $appointmentDatabase = new AppointmentDatabase();
  $appointment = $appointmentDatabase->readAppointmentById($id);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $appointmentDatabase = new AppointmentDatabase();
  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['appointment-time']) && isset($_POST['appointment-date'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $appointmentTime = $_POST['appointment-time'];
        $appointmentDate = $_POST['appointment-date'];
        $bookings = $appointmentDatabase->readAppointments();
        $id = $_GET['id'];
        foreach($bookings as $book){
          echo $book['patientName'];
        }
        // You can perform additional validation here if needed

        // Now, you can insert the data into the database using the createAppointment method
        $success = $appointmentDatabase->updateAppointment($id,$name, $email, $appointmentDate, $appointmentTime, 'Appointment Purpose'); // Replace 'Appointment Purpose' with actual purpose data
     
        if ($success) {
            header('Location: admin.php');
            echo "Appointment booked successfully!";
        } else {
            // Error occurred while inserting data
            echo "Error booking appointment. Please try again.";
        }
    } else {
        // Handle form validation errors or missing data here
        echo "Please fill in all the required fields.";
    }
}
?>

<div class="booking_page">
  <form action="update_page.php?id=<?php echo $id?>" method='POST' class='booking_form'>
    <h2>Clinic Appointment</h2>
    <label>Name:</label>
    <input type="text" name='name' value="<?php echo $appointment['patientName']; ?>">
    <label>Email:</label>
    <input type="email" name='email' value="<?php echo $appointment['patientEmail']; ?>">
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
      <!-- Other options... -->
    </select>
    <input type="date" id="appointment-date" name="appointment-date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" value="<?php echo $appointment['appointmentDate']; ?>">
    <button class='book_button'>Update Appointment</button>
  </form>
</div>

<?php 
require_once 'components/footer.php';
?>
</body>
