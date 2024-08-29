<?php

include('db.php');
$answer = '';
$err;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['answer'])) {
        $answer = htmlspecialchars($_POST['answer']);
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ответы и Вопросы</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .menu {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .menu a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .menu a:hover {
            color: #00BFFF;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        .box {
            background-color: #D3D3D3;
            border-radius: 5px;
            padding: 20px;
        }
        #answerForm {
            margin: 20px auto;
            width: 50%;
            text-align: center;
        }
        #displayQuestion {
            text-align: center;
            margin-top: 20px;
        }
        #answer1 {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        #submittedAnswer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
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
    
    <div class = "box">
        <h1><div id="displayQuestion"><?php if(!empty($_POST['name'])) {echo $_POST['name'];} else {echo 'Имя не найденно';} ?></div></h1>
        <h1><?php if(!empty($_POST['user_vopr'])) {echo $_POST['user_vopr'];} else { echo 'you dont press questhion';} ?></h1>
        <h2>Ответ на вопрос:</h2>
        <form id="answerForm" method="POST">
            <textarea id = "answer1" name="answer" placeholder="Введите ваш ответ" required></textarea>
            <button type="submit">Отправить ответ</button>
        </form>
        <h3><div id="submittedAnswer"></div><?php echo $answer ?></h3>
    </div>
    <?php 

    if (isset($err) && !empty($err)) {
        foreach ($err as $v) {
            echo "<strong>$v</strong><br>";
        }
    } else {
        echo "All good";
        echo " ";
    }
    
    ?>
</body>
</html>