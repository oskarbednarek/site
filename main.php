<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Welcome to the Forum</h2>
        <div class="top-mid">
            <button onclick="window.location.href='new_topic.php'">New Topic</button>
            <button onclick="window.location.href='topics.php'">Topics</button>
        </div>
        <button onclick="window.location.href='login.php'">Logout</button>
        <!-- css part -->
        <style>
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
                background-color: #f1f1f1;
                /* locate header at the top of the page */
                width: 100%;
                position: fixed;
                top: 0;
                left: 0; 
            }
            .header .top-mid {
                display: flex;
                align-items: center;
                background-color: red;
            }
            .header h2 {
                margin: 0;
            }
            .header button {
                margin-left: 10px;
                padding: 5px 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </div>
    <div class="chat">
        <h2>Chat</h2>
        <div class="chat-box">
            <div class="chat-message">
                <p>Username: Hello, how are you?</p>
            </div>
            <div class="chat-message">
                <p>Another user: I'm fine, thank you!</p>
            </div>
        </div>
        <form action="new_message.php" method="post">
        <input type="text" name="message" placeholder="Type your message here" required>
        <input type="submit" value="Send">
        </form>
    <div class="content">
        <h1>Welcome to the Forum</h1>
        <p>This is a simple forum example.</p>

    </body>
</html>