<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    $name = $_SESSION['name'];
    $message = htmlspecialchars($_POST['message']);
    $entry = $name . ': ' . $message . "\n";
    file_put_contents('messages.txt', $entry, FILE_APPEND);
    echo '<p>Message sent!</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentine Accepted</title>
    <style>
        body { background: #ffe6e6; font-family: "Comic Sans MS", cursive, sans-serif; text-align: center; padding-top: 15%; }
        h1 { color: #ff4e7a; }
        textarea { width: 80%; height: 100px; border-radius: 10px; border: 2px solid #ff6f91; padding: 10px; margin-bottom: 10px; }
        button { background: #ff6f91; color: white; padding: 10px 20px; border: none; border-radius: 20px; cursor: pointer; transition: background 0.3s; }
        button:hover { background: #ff4e7a; }
    </style>
</head>
<body>
    <h1>Fuck you, <?php echo $_SESSION['name']; ?>... heh.</h1>
    <form method="post">
        <textarea name="message" placeholder="Leave an anonymous message..."></textarea>
        <br>
        <button type="submit">Send</button>
    </form>
    <!-- Link removed for privacy -->
    <audio controls autoplay loop>
        <source src="The_Weeknd_-_Earned_It_Fifty_Shades_Of_Grey.mp3" type="audio/mp3">
      </audio>
</body>
</html>
