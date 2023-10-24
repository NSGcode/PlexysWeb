<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $message = $_POST["message"];

    // Specify the recipient email address
    $to = "plexyshealth@gmail.com";

    // Subject of the email
    $subject = "PROVIDER SUBMISSION";

    // Compose the email message
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\nMessage:\n$message";

    // Additional headers
    $headers = "From: $name";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        $response = array("message" => "Thank you! Your message has been sent.");
    } else {
        $response = array("message" => "Oops! Something went wrong, and we couldn't send your message.");
    }

  // Send response as JSON object
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>
