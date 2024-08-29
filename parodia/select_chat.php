<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбрать пользователя для переписки</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.app-container {
    display: flex;
}

.user-list {
    width: 200px;
    background: white;
    border-right: 1px solid #ccc;
    padding: 10px;
}

.user-list h2 {
    margin: 0;
}

.user-list ul {
    list-style: none;
    padding: 0;
}

.user-list li {
    padding: 10px;
    cursor: pointer;
}

.user-list li:hover {
    background-color: #f0f0f0;
}

.chat-container {
    width: 100%;
    max-width: 100%;
    margin: 20px auto;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    height: 500px;
}

header {
    background-color: #0088cc;
    color: white;
    padding: 10px;
    text-align: center;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.messages {
    flex-grow: 1;
    padding: 10px;
    overflow-y: auto;
}

.message {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
}

.outgoing .message-content {
    background-color: #0088cc;
    color: white;
    align-self: flex-end;
    padding: 10px;
    border-radius: 10px;
    max-width: 80%;
}

.incoming .message-content {
    background-color: #e5e5ea;
    color: black;
    align-self: flex-start;
    padding: 10px;
    border-radius: 10px;
    max-width: 80%;
}

footer {
    display: flex;
    padding: 10px;
    background-color: #f5f5f5;
    border-top: 1px solid #ccc;
}

footer input {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

footer button {
    padding: 10px;
    margin-left: 10px;
    background-color: #0088cc;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
    </style>
</head>
<body>
<div class="app-container">
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
        <aside class="user-list">
            <h2>Пользователи</h2>
            <ul>
                <li onclick="openChat('Иван')">Иван</li>
                <li onclick="openChat('Мария')">Мария</li>
                <li onclick="openChat('Алексей')">Алексей</li>
            </ul>
        </aside>
        <div class="chat-container" id="chatContainer" style="display: none;">
            <header>
                <h1 id="chatHeader">Чат с...</h1>
            </header>
            <div class="messages" id="messages">

            </div>
            <footer>
                <form id="messageForm">
                    <input type="text" id="message" placeholder="Введите сообщение..." required />
                    <input type="hidden" id="recipient" />
                    <button type="submit">Отправить</button>
                </form>
            </footer>
        </div>
    </div>
    <footer>
        <p>@copy 2024</p>
    </footer>

    <script>
let currentUser = '';

function openChat(user) {
    currentUser = user;
    document.getElementById('chatHeader').innerText = `Чат с ${user}`;
    document.getElementById('recipient').value = user; 
    document.getElementById('chatContainer').style.display = 'block';
    document.getElementById('messages').innerHTML = ''; 
}

const messageForm = document.getElementById('messageForm');

const messageList = document.getElementById('messages');
const recipientInput = document.getElementById('recipient');

messageForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const message = document.getElementById('message').value;
    const recipient = recipientInput.value;

    fetch('send_message.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'message=' + encodeURIComponent(message) + '&recipient=' + encodeURIComponent(recipient)
    })
    .then(response => response.text())
    .then(data => {
        messageList.innerHTML += data;
        messageForm.reset();
        messageList.scrollTop = messageList.scrollHeight; 
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
});

    </script>
</body>
</html>