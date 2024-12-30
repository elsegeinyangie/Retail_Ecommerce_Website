

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            height: 100vh;
        }

        /* Chatbot Button Styling */
        .chatbot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 30px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            z-index: 9999; /* Ensure button is above other elements */
        }

        .chatbot-button:hover {
            background-color: #218838;
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <!-- Chatbot Button -->
    <button class="chatbot-button" onclick="openChatbot()">Chat with Us</button>

    <script>
        function openChatbot() {
            // Redirect to the chatbot page
            window.location.href = "/Retail_Ecommerce_Website-1/public/test_chatbot.php";
        }
    </script>

</body>
</html>
 <?php
// Variable to store the chatbot response
$chatbot_response = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the message from the form input
    $message = $_POST['message'];

    // Prepare the data to be sent in JSON format
    $data = json_encode(array("prompt" => $message));

    // Set the URL of your Flask server's endpoint
    $url = 'http://127.0.0.1:5000/generate';  // Adjust if your Flask app is running on a different URL or port

    // Initialize cURL session
    $ch = curl_init($url);

    // Set the cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        $chatbot_response = 'Error: ' . curl_error($ch);
    } else {
        // Decode the JSON response from the Flask server
        $response_data = json_decode($response, true);
        if (isset($response_data['response'])) {
            $chatbot_response = "Chatbot response: " . $response_data['response'];
        } else {
            $chatbot_response = "Error: " . $response_data['error'];
        }
    }

    // Close the cURL session
    curl_close($ch);
}
?>

