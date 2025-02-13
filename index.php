<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentine's Invitation</title>
    <style>
        body {
            background: linear-gradient(145deg, #ff9aa2, #ffb7b2);
            font-family: 'Comic Sans MS', cursive, sans-serif;
            text-align: center;
            padding-top: 15%;
            color: #fff;
        }
        h1 {
            color: #fff;
            font-size: 3em;
            text-shadow: 2px 2px #ff6f91;
        }
        input[type="text"] {
            padding: 15px;
            border-radius: 30px;
            border: none;
            width: 60%;
            margin-bottom: 20px;
            font-size: 1.2em;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        button {
            background: #ff6f91;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        button:hover {
            background: #ff4e7a;
            transform: scale(1.05);
        }
        .heart {
            color: #fff;
            font-size: 5em;
            animation: beat 1s infinite;
        }
        @keyframes beat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
    </style>
</head>
<body>
    <h1>Enter your name:</h1>
    <form method="post" action="valentine.php">
        <input type="text" name="name" placeholder="Your Name" required>
        <br>
        <button type="submit">Continue ❤</button>
    </form>
    <div class="heart">❤</div>
</body>
</html>
