<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #333;
    color: white;
    padding: 20px;
}

header h1 {
    text-align: center;
    flex-grow: 1;
}

.avatar img {
    border-radius: 50%;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav li {
    margin-left: 20px;
}

nav a {
    color: white;
    text-decoration: none;
}

main {
    padding: 20px;
}

.news {
    margin-top: 20px;
}

.news article {
    margin-bottom: 20px;
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: white;
    position: relative;
    bottom: 0;
    width: 100%;
}
</style>
</head>
<body>
    <header>
        <div class="avatar">
            <img src="uploads/photo_2024-06-27_23-54-01.jpg" alt="Аватарка" width="50" height="50" href = "home.php">
        </div>
        <h1>Чат-Гаус</h1>
        <h4>Добро пожаловать,<?php echo 'name' // $_SESSION['name1'] ?></h4>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li> / 
                <li><a href="home.php">Профиль</a></li> /
                <li><a href="register.php">Регистрация</a></li> / 
                <li><a href="zvopr.php">Задать вопрос</a></li> /
                <li><a href="talk.php">Вопросы и ответы</a></li> /
                <li><a href="answer.php">Ваши ответы</a></li> /
                <li><a href="select_chat.php">Переписки</a></li> / 
                <li><a href="setting.php">Настройки</a></li> /
                <li><a href="errors.html">Сообщить об ошибке</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="news">
            <h2>Новости</h2>
            <article>
                <h3>Заголовок новости 1</h3>
                <p>Краткое содержание новости 1...</p>
            </article>
            <article>
                <h3>Заголовок новости 2</h3>
                <p>Краткое содержание новости 2...</p>
            </article>
            <article>
                <h3>Заголовок новости 3</h3>
                <p>Краткое содержание новости 3...</p>
            </article>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Ваш сайт. Все права защищены.</p>
    </footer>
</body>
</html>