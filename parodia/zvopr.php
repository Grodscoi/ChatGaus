<?php

$vopr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['user_vopr'])) {
        $vopr = htmlspecialchars($_POST['user_vopr']);
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задать вопрос</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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

        form {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        p {
            text-align: center;
            margin-top: 10px;
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

  <form action="talk.php" method="POST">
      <label for="vopr">Введите ваш вопрос:</label><br>
      <textarea id="vopr" name="user_vopr" rows="4" cols="50"></textarea><br>
      <input type="checkbox" name = "Categori"> 
      <input id ="sendVopr" type="submit" value="Отправить">
  </form>

<h1>Вопрос от вас:</h1>
<p><?php echo $vopr ?></p>

</body>
</html>