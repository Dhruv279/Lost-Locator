<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOSTLOCATOR</title>
    <link rel="stylesheet" href="home_style.css">
    <script src="app.js" defer></script>
    <script src="respoonse.js" defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        body {
            background-color: rgb(204, 222, 237);
        }

        header {
            /* background-color: black; */
            position: sticky;
            top: 0;
        }

        nav {
            display: flex;
        }

        nav ul li {
            list-style: none;
        }

        nav ul li a {
            padding: 10px;
            font-size: 20px;
            color: white;
            text-decoration: none;
        }

        nav ul {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .logoimg {
            width: 80px;
            border: none;
        }

        .show-chatbot .chatbot-toggler span:first-child,
        .chatbot-toggler span:last-child {
            opacity: 0;
        }

        .show-chatbot .chatbot-toggler span:last-child {
            opacity: 1;
        }

        .chatbot {
            background-color: white;
            height: 520px;
            width: 23%;
            margin: 160px 0px auto;
            border-radius: 20px 20px 0px 20px;
            position: fixed;
            right: 25px;
            bottom: 10%;
            overflow: hidden;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            transform: scale(0.5);
            opacity: 0;
            pointer-events: none;
            transform-origin: bottom right;
            transition: all 0.1s ease;
        }

        .show-chatbot .chatbot-toggler {
            transform: rotate(90deg);
        }

        .show-chatbot .chatbot {
            transform: scale(1);
            opacity: 1;
            pointer-events: auto;
        }

        .chatbot header {
            background-color: #6663b1;
            padding: 15px;
            text-align: center;
            border-radius: 10px 10px 0px 0px;
            height: 60px;
        }

        .chatbot header h2 {
            color: white;
            font-size: 1.4rem;
        }

        .chat-body {
            height: 400px;
            display: flex;
            flex-direction: column;
            padding: 8px 10px;
            align-items: flex-end;
            overflow: hidden;
            overflow-y: auto;
            position: relative;
        }

        .user-message,
        .chatbot-message {
            padding: 13px 16px;
            color: white;
            background: #8684c9;
            margin: 7px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .user-message {
            transform: translateY(50%);
            animation: fade-in-up 0.2s ease-in-out both;
        }

        @keyframes fade-in-up {
            0% {
                transform: translateY(50%);
                opacity: 0;
            }

            100% {
                transform: translateY(0%);
                opacity: 1;
            }
        }

        .chatbot-message {
            background: #dde1e8;
            color: black;
            align-self: flex-start;
            border-radius: 10px;
            transform: translateY(-50%);
            animation: fade-in-down 0.3s ease-in-out both;
        }

        @keyframes fade-in-down {
            0% {
                transform: translateY(-50%);
                opacity: 0;
            }

            100% {
                transform: translateY(0%);
                opacity: 1;
            }
        }

        .chatbot .chat_input {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #fff;
            border-top: 1px solid rgb(126, 132, 152);
            padding: 5px 15px;
            display: flex;
            align-items: center;
            height: 60px;
        }

        .chat_input input {
            border: none;
            height: 50px;
            width: 90%;
            outline: none;
            font-size: .95rem;
            padding: 16px 15px 16px 0px;
            resize: none;
        }

        .chat_input span {
            color: #faf9ff;
            cursor: pointer;
            visibility: hidden;
        }

        .chat_input input:valid~span {
            visibility: visible;
        }

        .chat-body::-webkit-scrollbar {
            width: 0px;
        }

        .bot-response-container {
            display: flex;
            align-items: center;
            align-self: flex-start;
        }

        .chatbot-toggler {
            position: fixed;
            right: 25px;
            bottom: 2%;
            background: #6663b1;
            display: flex;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 23px;
            transition: all 0.2s ease;
        }

        .chatbot-toggler span {
            position: absolute;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="lost.php">Lost</a></li>
                <li><a href="found.php">Found</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="seraching_filtering.php">Serach Items</a></li>
                <li><a href="login.php">Login</a></li>
                <!-- <li><a href="sign-up.php">Sign Up</a></li> -->
            </ul>
        </nav>
    </header>
    <div class="head">
        <h1>Welcome to the LOSTLOCATOR Portal</h1>
        <p>Report lost items, find lost items, and help others reclaim their belongings.</p>
    </div>
    <section id="main-content">
        <h2>Get Started</h2>
        <section id="lost-and-found">
            <div class="card">
                <h2>Lost Item</h2>
                <p>If you've lost an item, use our <a href="lost.php">Lost Item</a> form to report it.</p>
                <img src="lost-item.png" alt="Lost Item Photo">
            </div>
            <div class="card">
                <h2>Found Item</h2>
                <p>If you've found an item, use our <a href="found.php">Found Item</a> form to report it.</p>
                <img src="found-item.png" alt="Lost Item Photo">
            </div>
        </section>
        <h2>About Us</h2>
        <p>We are dedicated to helping our university community recover lost items and return them to their rightful
            owners. Whether you've lost something or found an item, we're here to assist you.</p>
        <h2>Contact Us</h2>
        <p>If you have any questions or need assistance, feel free to <a href="contact.php">contact us</a>.</p>
    </section>
    <button class="chatbot-toggler">
        <span class="material-symbols-outlined"><img src="comment.png" width="25px" alt=""></span>
        <span class="material-symbols-outlined"><img src="close.png" width="25px" alt=""></span>
    </button>
    <div class="main_container">
        <div class="chatbot">
            <header>
                <h2>Chat-b0At</h2>
            </header>
            <div class="chat-body"></div>
            <div class="chat_input">
                <input required placeholder="Ask your doubt here ..." type="text" id="text_input">
                <span><img class="send_button" src="send (1).png" width="30px" alt=""></span>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 PDEU - Lost and Found</p>
    </footer>

</body>

</html>