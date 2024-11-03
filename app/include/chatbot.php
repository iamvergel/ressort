<?php
session_start();

// Initialize a variable to hold the bot's response
$response = '';

// Check if a message has been sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = strtolower(trim($_POST['message']));

    // Process the user's message and provide a response
    switch ($message) {
        case 'what are your available dates for booking the resort?':
            $response = "Hello! Thank you for your inquiry. Our available booking dates depend on current reservations. Can you please specify the dates you're interested in, so I can check for availability?";
            break;
        case 'what is the price for booking the entire resort?':
            $response = "The price for booking the entire resort varies based on the season and the number of guests. Could you provide more details, like the number of guests and preferred dates? That way, I can give you an accurate quote.";
            break;
        case 'how many people can the resort accommodate?':
            $response = "Our resort can comfortably accommodate up to 15 - 20 guests. If your group exceeds this number, please let us know, and we can discuss options.";
            break;
        case 'what amenities does the resort offer?':
            $response = "We offer a variety of amenities, including a private pool, outdoor BBQ area, full kitchen, free Wi-Fi, air-conditioned rooms, and more. Would you like a complete list of our amenities?";
            break;
        case 'are food and drinks included, or is there a catering service?':
            $response = "Food and drinks are not included, but you are welcome to bring your own food and drinks.";
            break;
        case 'is there a minimum or maximum stay duration?':
            $response = "Yes, we have a minimum stay of 8 hours nights, especially during peak seasons. There’s no maximum duration for stays, but longer stays may qualify for special rates. What are your intended dates?";
            break;
        case 'do you require a deposit for the reservation?':
            $response = "Yes, we require a (1) One thousand deposit to secure your reservation. The balance is due depending on the date before your check-in date. Would you like more details on how to make the deposit?";
            break;
        case 'can i cancel or reschedule my booking?':
            $response = "Yes, we offer cancellation or rescheduling options depending on the timing. Please refer to our cancellation policy for more details. Would you like me to send you the policy?";
            break;
        default:
            $response = "I'm sorry, I didn't understand that. Please ask another question.";
            break;
    }

    // Return the response
    echo $response;
    exit; // Stop further script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Resort Chatbot</title>
    <style>
        .chatbox {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f9f9f9;
            height: 400px;
            overflow-y: auto;
        }
        .message {
            margin-bottom: 10px;
        }
        .user { text-align: right; }
        .bot { text-align: left; }
        .button-container {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="chatbox">
    <h3>Chat with Us!</h3>
    <div id="chatMessages"></div>
    <input type="text" id="userInput" class="form-control" placeholder="Type your question here...">
    <button id="sendBtn" class="btn btn-primary mt-2">Send</button>

    <div class="button-container">
        <button class="btn btn-outline-secondary" onclick="sendPredefined('what are your available dates for booking the resort?')">Available Dates</button>
        <button class="btn btn-outline-secondary" onclick="sendPredefined('what is the price for booking the entire resort?')">Price for Entire Resort</button>
        <button class="btn btn-outline-secondary" onclick="sendPredefined('how many people can the resort accommodate?')">Capacity</button>
        <button class="btn btn-outline-secondary" onclick="sendPredefined('what amenities does the resort offer?')">Amenities</button>
    </div>
</div>

<script>
    // Function to initialize chat with a welcome message
    function initChat() {
        const chatMessages = document.getElementById('chatMessages');
        chatMessages.innerHTML += `<div class="message bot">Hello! Welcome to Villa Reyes Resort! How can I assist you today?</div>`;
        chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll to the bottom
    }

    document.getElementById('sendBtn').addEventListener('click', function() {
        sendMessage();
    });

    document.getElementById('userInput').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });

    function sendMessage() {
        const userInput = document.getElementById('userInput').value;
        const chatMessages = document.getElementById('chatMessages');

        if (userInput) {
            chatMessages.innerHTML += `<div class="message user">${userInput}</div>`;
            document.getElementById('userInput').value = '';

            // Simulate a delay for the bot's response
            setTimeout(() => {
                fetch('chatbot.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'message=' + encodeURIComponent(userInput)
                })
                .then(response => response.text())
                .then(data => {
                    chatMessages.innerHTML += `<div class="message bot">${data}</div>`;
                    chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll to the bottom
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }, 1000); // 1 second delay for the bot response
        }
    }

    function sendPredefined(message) {
        document.getElementById('userInput').value = message;
        sendMessage();
    }

    // Initialize the chat when the page loads
    window.onload = initChat;
</script>

</body>
</html>
