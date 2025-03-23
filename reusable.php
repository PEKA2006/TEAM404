<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = trim($_POST['message']);
    $messageIndex = isset($_POST['messageIndex']) ? (int)$_POST['messageIndex'] : 0;

    // Bot messages for the chatbot flow
    $botMessages = [
        "Hello! Welcome to our appointment booking chatbot.",
        "May I know your name, please?",
        "What date would you like to book your appointment? (e.g., 2025-03-25)",
        "What time would you like to book your appointment? (e.g., 2:00 PM)",
        "Thank you! Your appointment has been booked successfully. Have a great day!"
    ];

    // Response handling
    $response = [
        'botMessage' => $botMessages[$messageIndex] ?? "I'm sorry, I don't understand that.",
        'nextIndex' => $messageIndex + 1
    ];

    if ($messageIndex >= count($botMessages)) {
        $response['botMessage'] = "All details received! Thank you for using our chatbot.";
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reusable Chatbot</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        /* Chatbot Container Positioned in the Bottom-Right Corner */
        .chatbot-container {
            width: 400px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: white;
            overflow: hidden;
        }
        .chat-header {
            background: #66bb6a;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .chat-body {
            max-height: 400px;
            overflow-y: auto;
            padding: 1rem;
            border-top: 1px solid #ccc;
        }
        .chat-footer {
            display: flex;
            border-top: 1px solid #ccc;
        }
        .chat-footer input {
            flex: 1;
            padding: 0.5rem;
            border: none;
            outline: none;
        }
        .chat-footer button {
            background: #66bb6a;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }
        .chat-footer button:hover {
            background: #4caf50;
        }
        .message {
            margin: 0.5rem 0;
        }
        .bot-message {
            color: #4caf50;
        }
        .user-message {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="chatbot-container">
        <div class="chat-header">Reusable Chatbot</div>
        <div class="chat-body" id="chatBody"></div>
        <div class="chat-footer">
            <input type="text" id="userInput" placeholder="Type your message here...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        const chatBody = document.getElementById('chatBody');
        const userInput = document.getElementById('userInput');
        let messageIndex = 0;

        function addMessage(content, sender = 'bot') {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender === 'bot' ? 'bot-message' : 'user-message');
            messageDiv.textContent = content;
            chatBody.appendChild(messageDiv);
            chatBody.scrollTop = chatBody.scrollHeight; // Auto-scroll to bottom
        }

        async function sendMessage() {
            const userMessage = userInput.value.trim();
            if (!userMessage) return;

            // Display user message
            addMessage(userMessage, 'user');
            userInput.value = '';

            // Fetch bot response
            const response = await fetch(window.location.href, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `message=${encodeURIComponent(userMessage)}&messageIndex=${messageIndex}`
            });

            const data = await response.json();
            addMessage(data.botMessage, 'bot');
            messageIndex = data.nextIndex;
        }

        // Allow sending messages with Enter key
        userInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body>
</html>
