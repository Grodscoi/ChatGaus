<?php

session_start();

include('db.php');

$uploaddir = 'uploads/';
$avatar = "photo_2024-06-27_23-54-01.jpg";
$er;

if (!empty($_POST)) {

  if(!empty($_POST['name'])) {
    $name = $_POST['name'];
    $_SESSION['name1'] = $name;
  } else {
    $er[] = 'the name is not filled in';
  }

  if(!empty($_POST['password'])) {
    $pas = $_POST['password'];
  } else {
    $er[] = 'the password is not filled in';
  }

  if(!empty($_POST['email'])) {
    $email = $_POST['email'];
  } else {
    $er[] = 'the email is not filled in';
  }

  if(!empty($_FILES['file1'])) {
    $file = $_FILES['file1'];
    $_SESSION['file'] = $_FILES['file1'];
    $uploadfile = $uploaddir . basename($_FILES['file1']['name']);
  } else {
    $er[] = 'the file is not filled in';
  }

  if (strlen($pas) < 6) {
    $er[] = 'the password is less than 6 characters long';
  }

  if($_FILES['file1']['size'] < 2*1024*1024) {
    if (isset($_FILES['file1']) && $_FILES['file1']['error'] === UPLOAD_ERR_OK) {
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (in_array($_FILES['file1']['type'], $allowedTypes)) {
        if (move_uploaded_file($_FILES['file1']['tmp_name'], $uploadfile)) {
          echo "File uploaded successfully!\n";
        }
      } else {
        $er[] = 'Invalid file type. Only images are allowed.';
      }
    }
  } else {
    $er[] = "file have more size";
  }

  if (isset($er)) {
    foreach ($er as $v) {
      echo "<strong>$v</strong><br>";
    }
  } else {
    echo "Registration successful!"; 
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <style>
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}

.container {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 30px;
  text-align: center;
  width: 400px;
}

.avatar {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin-bottom: 20px;
  border: 4px solid #fff;
}

h1 {
  margin-bottom: 15px;
  color: #333;
}

p {
  margin-bottom: 10px;
  font-size: 16px;
  color: #666;
}

.info-section {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.info-section p {
  margin: 0;
}

.info-section span {
  font-weight: bold;
}
footer {
  text-align: center;
  padding: 10px;
  background-color: #333;
  color: white;
  position: fixed;
  bottom: 0;
  width: 100%;
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

    <img src="uploads/<?php if($set_avatar == null) {echo $avatar;} else {echo $set_avatar;} ?>" class = "avatar">
    <p><?php if(!empty($name)) {echo $name;} else {echo "the name is not filled in";} ?> - Ваше имя</p>
    <p><?php if(!empty($pas) && empty($er)) {echo $pas;} else {echo "the password is not filled in";} ?> - Ваш пароль</p>
    <p><?php if(!empty($email)) {echo $email;} else {echo "the email is not filled in";}?> - Ваш email</p>
    <p><?php if(empty($er)) {echo $_COOKIE["message_count"];} else {echo "you dont have message";} ?> - Вашe количество вопросов</p>
    <p><?php if(empty($er)) {echo $_COOKIE["answer_count"];} else {echo "you dont have answer";}?> - Ваше количество ответов</p>
    <p><?php if(!empty($_FILES['file1']['name']) && empty($er)) {echo $_FILES['file1']['name'];} else {echo "the file is not filled in";} ?> - Ваш файл</p>

    <a href="answer.php">Посмотреть свои ответы</a>
    <footer>
        <p>@copy 2024</p>
    </footer>
</body>
</html>