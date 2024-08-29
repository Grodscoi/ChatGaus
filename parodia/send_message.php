<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = htmlspecialchars($_POST["message"]);
    $recipient = htmlspecialchars($_POST["recipient"]);
    
    echo '<div class="message outgoing"><div class="message-content">' . $_SESSION['name'] . ': ' . $message . '</div></div>';
}
?>