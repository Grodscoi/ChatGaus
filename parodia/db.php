<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_COOKIE["message_count"])) {
        $messageCount = intval($_COOKIE["message_count"])+ 1;
    } else {
        $messageCount = 1;
    }
    setcookie("message_count", $messageCount, time() + (86400 * 30), "/");

    if(isset($_COOKIE["answer_count"])) {
        $answercount = intval($_COOKIE['answer_count'])+ 1;
    } else {
        $answercount = 1;
    }
    setcookie("answer_count", $answercount, time() + (86400 * 30), "/");

}

?>