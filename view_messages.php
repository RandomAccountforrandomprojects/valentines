<?php
session_start();

// Set your admin password here
$admin_password = "YourSecretPassword"; 

// Check if password is submitted
if (isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['is_admin'] = true;
    } else {
        echo "<p style='color:red;'>Incorrect password!</p>";
    }
}

// If not logged in as admin, show login form
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    echo '<!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Admin Login</title>
              <style>
                  body { background: #ffe6e6; font-family: Arial, sans-serif; text-align: center; padding-top: 15%; }
                  input[type="password"] {
                      padding: 10px;
                      border-radius: 10px;
                      border: 2px solid #ff6f91;
                      width: 60%;
                      margin-bottom: 20px;
                      font-size: 1.2em;
                  }
                  button {
                      background: #ff6f91;
                      color: white;
                      padding: 10px 20px;
                      border: none;
                      border-radius: 20px;
                      cursor: pointer;
                      font-size: 1.2em;
                      transition: background 0.3s;
                  }
                  button:hover { background: #ff4e7a; }
              </style>
          </head>
          <body>
              <h1>Admin Login</h1>
              <form method="post">
                  <input type="password" name="password" placeholder="Enter Admin Password" required>
                  <br>
                  <button type="submit">Login</button>
              </form>
          </body>
          </html>';
    exit();
}

// If admin is logged in, show the messages and choices
$messages = file_exists('messages.txt') ? file('messages.txt') : [];
$choices = file_exists('choices.txt') ? file('choices.txt') : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentine Responses</title>
    <style>
        body { background: #ffe6e6; font-family: Arial, sans-serif; text-align: center; padding-top: 10%; }
        h1 { color: #ff4e7a; }
        .box {
            background: white;
            color: #ff4e7a;
            padding: 15px;
            margin: 10px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: left;
        }
        a {
            color: #ff4e7a;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Valentine Messages</h1>
    <?php
    if (empty($messages)) {
        echo '<p>No messages yet.</p>';
    } else {
        foreach ($messages as $msg) {
            echo '<div class="box">' . htmlspecialchars($msg) . '</div>';
        }
    }
    ?>
    <h1>Choice History</h1>
    <?php
    if (empty($choices)) {
        echo '<p>No choices recorded yet.</p>';
    } else {
        foreach ($choices as $choice) {
            echo '<div class="box">' . htmlspecialchars($choice) . '</div>';
        }
    }
    ?>
    <p><a href="index.php">Go Back</a></p>
</body>
</html>
