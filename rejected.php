<?php
session_start();
echo '<style>
        body { background: #ffe6e6; font-family: "Comic Sans MS", cursive, sans-serif; text-align: center; padding-top: 20%; color: #ff4e7a; }
        h1 { color: #ff4e7a; }
      </style>
      <h1>Fuck you, ' . $_SESSION['name'] . '... Suck your mum.</h1>';
?>
