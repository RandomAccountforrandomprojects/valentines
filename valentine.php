<?php
session_start();

// Start tracking choices if not already done
if (!isset($_SESSION['choices'])) {
    $_SESSION['choices'] = [];
}

// Save name if just arrived from index
if (isset($_POST['name'])) {
    $_SESSION['name'] = htmlspecialchars($_POST['name']);
    $_SESSION['clicks'] = 0;
}

// Redirect if clicked No 9 times
if ($_SESSION['clicks'] >= 9) {
    header('Location: rejected.php');
    exit();
}

// Handle Yes click
if (isset($_POST['yes'])) {
    $_SESSION['choices'][] = 'Yes';
    file_put_contents('choices.txt', $_SESSION['name'] . ': Yes' . "\n", FILE_APPEND);
    header('Location: accepted.php');
    exit();
}

// Handle No click
if (isset($_POST['no'])) {
    $_SESSION['choices'][] = 'No';
    file_put_contents('choices.txt', $_SESSION['name'] . ': No' . "\n", FILE_APPEND);
    $_SESSION['clicks']++;
    switch ($_SESSION['clicks']) {
        case 1: $message = 'Click again to confirm'; break;
        case 2: $message = 'No valentine this year'; break;
        case 3: $message = 'Should I be hurt by this?'; break;
        default: $message = 'Click again...'; break;
    }
} else {
    $message = '';
}

echo '<style>
        body { background: pink; font-family: Arial, sans-serif; text-align: center; padding-top: 10%; }
        button { background: #ff6f91; color: white; padding: 10px 20px; border: none; border-radius: 20px; cursor: pointer; transition: background 0.3s; margin: 10px; }
        button:hover { background: #ff4e7a; }
      </style>
      <h1>Do you wanna be my valentine, ' . $_SESSION['name'] . '?</h1>
      <form method="post">
          <button name="yes">Yes</button>
          <button name="no">No</button>
      </form>
      <p>' . $message . '</p>';

echo '<audio controls autoplay loop>
        <source src="The_Weeknd_-_Earned_It_Fifty_Shades_Of_Grey.mp3" type="audio/mp3">
      </audio>';
?>
