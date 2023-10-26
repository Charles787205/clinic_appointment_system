<?php

class AppointmentDatabase {
    private $db = 'clinic_appointment_system';

    public function __construct() {
       
         try {
            $this -> db = new mysqli('sql210.infinityfree.com', 'if0_35305741', 'RllhgofVgso', 'if0_35305741_clinic_appointment_database');

            if (mysqli_connect_errno()){
              throw new Exception("Could not connect to database.");
            } 
            }catch (Exception $e){
              throw new Exception($e -> getMessage());
            }
    }

    public function createAppointment($patientName, $patientEmail, $appointmentDate, $appointmentTime, $appointmentPurpose) {
        $query = "INSERT INTO Appointments (patient_name, patient_email, appointment_date, appointment_time, appointment_purpose) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $patientName, $patientEmail, $appointmentDate, $appointmentTime, $appointmentPurpose);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function readAppointments() {
    $query = "SELECT * FROM Appointments";
    $results = $this->db->query($query);

    // Check if the query was successful
    if ($results) {
        $bookings = [];

        // Fetch the results as an associative array
        while ($row = $results->fetch_assoc()) {
            // Add each appointment's data to the $bookings array
            $bookings[] = array(
                'appointmentId' => $row['appointment_id'],
                'patientName' => $row['patient_name'],
                'patientEmail' => $row['patient_email'],
                'appointmentDate' => $row['appointment_date'],
                'appointmentTime' => $row['appointment_time'],
                'appointmentPurpose' => $row['appointment_purpose']
            );
        }

        // Free the result set
        $results->free_result();

        return $bookings;
    } else {
        // Handle query execution errors
        return null;
    }
}
    public function readAppointmentById($appointmentId) {
    $query = "SELECT * FROM Appointments WHERE appointment_id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $appointmentId);
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // No appointment found with the given ID
        return null;
    } else {
        // Fetch the appointment as an associative array
        $row = $result->fetch_assoc();

        $appointment = array(
            'appointmentId' => $row['appointment_id'],
            'patientName' => $row['patient_name'],
            'patientEmail' => $row['patient_email'],
            'appointmentDate' => $row['appointment_date'],
            'appointmentTime' => $row['appointment_time'],
            'appointmentPurpose' => $row['appointment_purpose']
        );

        // Close the statement
        $stmt->close();

        return $appointment;
    }
}


    public function updateAppointment($appointmentId, $patientName, $patientEmail, $appointmentDate, $appointmentTime, $appointmentPurpose) {
        $query = "UPDATE Appointments 
                  SET patient_name=?, patient_email=?, appointment_date=?, appointment_time=?, appointment_purpose=?
                  WHERE appointment_id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssssi", $patientName, $patientEmail, $appointmentDate, $appointmentTime, $appointmentPurpose, $appointmentId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAppointment($appointmentId) {
        $query = "DELETE FROM Appointments WHERE appointment_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $appointmentId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
