<?php
// Validate and process form data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Perform validation
    $errors = [];

    if (empty($full_name)) {
        $errors[] = "Full Name is required.";
    }

    if (empty($phone_number)) {
        $errors[] = "Phone Number is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email format.";
    }

    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }

    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Save data to database
        $db_host = "your_db_host";
        $db_user = "your_db_username";
        $db_password = "your_db_password";
        $db_name = "your_db_name";

        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $ip_address = $_SERVER['REMOTE_ADDR'];
        $timestamp = date('Y-m-d H:i:s');

        $sql = "INSERT INTO contact_form (full_name, phone_number, email, subject, message, ip_address, timestamp)
                VALUES ('$full_name', '$phone_number', '$email', '$subject', '$message', '$ip_address', '$timestamp')";

        if (mysqli_query($conn, $sql)) {
            // Send email notification
            $to = "test@techsolvitservice.com";
            $subject = "New Contact Form Submission";
            $email_message = "Full Name: $full_name\n"
                           . "Phone Number: $phone_number\n"
                           . "Email: $email\n"
                           . "Subject: $subject\n"
                           . "Message: $message\n"
                           . "IP Address: $ip_address\n"
                           . "Timestamp: $timestamp";

            mail($to, $subject, $email_message);

            echo "Form submitted successfully. We will get in touch with you shortly.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>
