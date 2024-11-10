<?php
// User-related
$username = "Leon";
$userColor = "#FF4500"; 
$userAvatar = "https://fld.wtf/img/6713b11189e74.png"; 

// Bot-related
$botName = "Tom";
$botColor = "#6A0DAD"; 
$botAvatar = "https://fld.wtf/img/6713a513e987d.png"; 
$botTagBackgroundColor = "#5865f2"; 

// Banner
$bannerURL = "https://fld.wtf/img/6713a71c5d6a8.jpg"; 
$bannerLink = "https://discord.gg/jr2VsRsqEp";

// Input message
$inputMessage = "!help"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $botName; ?> - Your Digital Assistant</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo $botAvatar; ?>" type="image/png"> 
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #36393F; 
            color: #FFF;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            background-color: transparent;
            border-radius: 8px;
            padding: 20px;
            max-width: 700px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; 
            position: relative; 
        }

        .message-area {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-bottom: 90px; 
        }
        .message {
            visibility: hidden; 
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        .message img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .message .name-container {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
        }
        .message .username {
            font-weight: 700;
            color: <?php echo $userColor; ?>; 
            font-size: 16px; 
        }
        .message .timestamp {
            font-size: 12px;
            color: #72767D; 
            margin-left: 10px;
        }
        .message .content {
            background-color: transparent; 
            border-radius: 5px;
            padding: 0;
            max-width: 600px;
        }
        .message .text {
            color: #DCDDDE; 
            font-size: 16px; 
        }
        .bot-header {
            visibility: hidden; 
            display: flex;
            align-items: flex-start;
            margin-bottom: 5px;
        }
        .bot-header img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .bot-header .name-container {
            display: flex;
            align-items: center;
        }
        .bot-header .username {
            font-weight: 700;
            color: <?php echo $botColor; ?>; 
            font-size: 16px; 
        }
        .bot-header .bot-tag {
            background-color: <?php echo $botTagBackgroundColor; ?>;
            color: #FFF;
            font-size: 12px;
            font-weight: 500;
            padding: 2px 5px;
            margin-left: 10px;
            border-radius: 3px;
        }
        .bot-header .timestamp {
            font-size: 12px;
            color: #72767D; 
            margin-left: 10px;
        }
        .bot-message {
            visibility: hidden; 
            margin-left: 57px; 
            margin-bottom: 20px;
        }
        .bot-message .content {
            background-color: #2F3136; 
            border-radius: 5px;
            padding: 15px 20px;
            max-width: 600px;
            text-align: left;
            border-left: 5px solid <?php echo $botColor; ?>; 
            margin-top: 5px; 
        }
        .bot-message .commands-section {
            margin-bottom: 15px;
        }
        .bot-message .commands-section h2 {
            font-size: 16px; 
            color: #7289DA;
            margin-bottom: 5px;
        }
        .bot-message .commands-section .command {
            font-size: 14px;
            padding: 5px 0;
            color: #DCDDDE;
            display: flex;
            align-items: center;
        }
        .bot-message .commands-section .command::before {
            content: '🔹'; 
            font-size: 18px; 
            margin-right: 8px;
        }
        .banner {
            margin-top: 20px;
            text-align: center;
        }
        .banner img {
            width: 100%;
            height: auto; 
            border-radius: 4px; 
        }
        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #99AAB5;
            display: flex;
            align-items: center;
        }
        footer img {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .input-field {
            position: absolute;
            bottom: 0;
            background-color: #40444B;
            width: 100%;
            padding: 10px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        .input-field input {
            background-color: #2C2F33;
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: #FFF;
            width: 100%;
            font-size: 15px;
        }
        .input-field input::placeholder {
            color: #72767D;
        }
        .input-field .buttons {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }
        .input-field .icon {
            margin-right: 15px; 
            cursor: pointer;
            color: #B9BBBE;
            font-size: 28px; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="message-area" id="messageArea">
        <div class="message" id="userMessage">
            <img src="<?php echo $userAvatar; ?>" alt="<?php echo $username; ?>'s Avatar">
            <div class="content">
                <div class="name-container">
                    <span class="username"><?php echo $username; ?></span>
                    <span class="timestamp" id="userTimestamp"></span>
                </div>
                <div class="text"><?php echo $inputMessage; ?></div>
            </div>
        </div>

        <div class="bot-header" id="botHeader">
            <img src="<?php echo $botAvatar; ?>" alt="<?php echo $botName; ?>'s Avatar">
            <div class="name-container">
                <span class="username"><?php echo $botName; ?></span>
                <span class="bot-tag">APP</span>
                <span class="timestamp" id="botTimestamp"></span>
            </div>
        </div>

        <div class="bot-message" id="botMessage">
            <div class="content">
                <p><strong><?php echo $botName; ?></strong> - Just call me by typing <strong>!command</strong> or using <strong>/command</strong> for slash commands.</p>

                <div class="commands-section">
                    <h2>Message Commands</h2>
                    <div class="command">!hello: <?php echo $botName; ?> greets you in a sleek, modern style.</div>
                    <div class="command">!help: Provides a list of available commands and their descriptions.</div>
                    <div class="command">!ping: Replies with Pong!</div>
                </div>

                <div class="commands-section">
                    <h2>Slash Commands</h2>
                    <div class="command">/serverinfo: Displays information about the server.</div>
                </div>

                <div class="banner">
                    <a href="<?php echo $bannerLink; ?>" target="_blank">
                        <img src="<?php echo $bannerURL; ?>" alt="Join <?php echo $botName; ?>'s Discord">
                    </a>
                </div>

                <footer>
                    <img src="<?php echo $botAvatar; ?>" alt="<?php echo $botName; ?>'s Avatar">
                    <?php echo $botName; ?> - Always here to help
                </footer>
            </div>
        </div>
    </div>

    <div class="input-field" id="inputField">
        <span class="material-icons icon">add_circle_outline</span>
        <input type="text" placeholder="Message to <?php echo $botName; ?>" id="typingInput" disabled>
        <div class="buttons">
            <span class="material-icons icon">card_giftcard</span>
            <span class="material-icons icon">emoji_emotions</span>
        </div>
    </div>
</div>

<script>
    function getCurrentTime() {
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12; 
        return `Today at ${hours}:${minutes} ${ampm}`;
    }

    document.getElementById('userTimestamp').textContent = getCurrentTime();
    document.getElementById('botTimestamp').textContent = getCurrentTime();

    const typingInput = document.getElementById('typingInput');
    const message = '<?php echo $inputMessage; ?>';
    let i = 0;

    function typeMessage() {
        if (i < message.length) {
            typingInput.value += message.charAt(i);
            i++;
            setTimeout(typeMessage, 150); 
        } else {
            setTimeout(() => {
                typingInput.value = ""; 
                document.getElementById('userMessage').style.visibility = 'visible'; 

                setTimeout(() => {
                    document.getElementById('botHeader').style.visibility = 'visible';
                    document.getElementById('botMessage').style.visibility = 'visible';
                }, 2000);
            }, 500);
        }
    }

    setTimeout(typeMessage, 1000);
</script>

</body>
</html>
