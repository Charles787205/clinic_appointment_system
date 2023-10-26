<?php 
require_once 'Database/AppointmentDatabase.php';
  $id = $_GET['id'];
  $appointmentDb = new AppointmentDatabase();
  $appointmentDb->deleteAppointment($id);
  header('Location: admin.php');
