<?php

include('talk.php');
$err1 = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['answer'])) {
        echo "Мы нашли ваши ответы на вопросы";
    } else {
        $err1[] = "Мы не нашли ваши ответы";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ответы</title>
</head>
<body>
    <div>
          <a href="index.php">Главная</a> / 
          <a href="home.php">Профиль</a> /
          <a href="register.php">Регистрация</a> / 
          <a href="zvopr.php">Задать вопрос</a> /
          <a href="talk.php">Вопросы и ответы</a> /
          <a href="answer.php">Ваши ответы</a> /
          <a href="select_chat.php">Переписки</a> / 
          <a href="setting.php">Настройки</a> /
          <a href="errors.html">Сообщить об ошибке</a>
    </div>

    <h1>Ваши ответы :</h1>
    <p><?php
    if(empty($_POST['answer'])) {
        $err1[] = "you dont press answer";
        echo "you dont press answer";
    } else {
        echo htmlspecialchars($_POST['answer']);
    } 
    ?></p>

    <h1>Количество ваших ответов : </h1>
    <p><?php echo $_COOKIE["answer_count"]; ?>

    <?php
    if (isset($err1) && !empty($err1)) {
        foreach ($err1 as $v) {
            for ($i=1; $i < sizeof($err1); $i++) { 
                echo $i;
            }
            echo "<strong>$v</strong><br>";
        }
    } else {
        echo "All good";
    }
    ?>
</body>
</html>