<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Настройки</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            transition: background-color 0.3s, font-family 0.3s; /* добавлен переход для шрифта */
        }

        .chat-container {
            width: 400px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Остальные стили... */

        body.dark-theme {
            background-color: #333;
            color: white;
        }

        .chat-container.dark-theme {
            background-color: #444;
            border-color: #555;
        }

        /* Ваша анимация ... */
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

    <h1 id="fontLabel">Выберите шрифт :</h1>
    <select id="fontSelector">
        <option value="Arial">Arial</option>
        <option value="Courier New">Courier New</option>
        <option value="Georgia">Georgia</option>
        <option value="Times New Roman">Times New Roman</option>
        <option value="Verdana">Verdana</option>
    </select>

    <h1 id="themeLabel">Выберите тему:</h1>
    <select id="ThemeSelector">
        <option value="WhiteTheme">Белая</option>
        <option value="blackTheme">Черная</option>
    </select>

    <h1 id="languageLabel">Выберите язык:</h1>
    <select id="languageSelector">
        <option value="ru">Русский</option>
        <option value="en">English</option>
    </select>

    <div id="text">Это пример текста.</div>
    <button id="colorButton" class="button">Просто покликать :)</button>

    <script>
        // Обработка загрузки страницы
        document.addEventListener('DOMContentLoaded', () => {
            // Загрузка сохранённой темы из Local Storage
            const savedTheme = localStorage.getItem('theme');
            const themeSelector = document.getElementById('ThemeSelector');

            if (savedTheme) {
                if (savedTheme === "blackTheme") {
                    document.body.classList.add('dark-theme');
                    themeSelector.value = 'blackTheme';
                } else {
                    themeSelector.value = 'WhiteTheme';
                }
            }

            // Загрузка сохранённого шрифта из Local Storage
            const savedFont = localStorage.getItem('font');
            const fontSelector = document.getElementById('fontSelector');

            if (savedFont) {
                document.body.style.fontFamily = savedFont; // Применение выбранного шрифта
                fontSelector.value = savedFont; // Установка в селектор
            }

            // Обработка изменения шрифта
            fontSelector.addEventListener('change', function() {
                const selectedFont = fontSelector.value;
                document.body.style.fontFamily = selectedFont; // Применение шрифта на странице
                localStorage.setItem('font', selectedFont); // Сохранение шрифта в Local Storage

            });

// Обработка изменения темы
themeSelector.addEventListener('change', function() {
    if (themeSelector.value === "blackTheme") {
        document.body.classList.add('dark-theme');
        localStorage.setItem('theme', 'blackTheme');
    } else {
        document.body.classList.remove('dark-theme');
        localStorage.setItem('theme', 'WhiteTheme');
    }
});

// Обработка смены языка
const languageSelector = document.getElementById('languageSelector');
languageSelector.addEventListener('change', function() {
    const selectedLanguage = languageSelector.value;
    changeLanguage(selectedLanguage);
});

// Функция изменения языка
function changeLanguage(language) {
    const translations = {
        ru: {
            fontLabel: "Выберите шрифт:",
            themeLabel: "Выберите тему:",
            languageLabel: "Выберите язык:",
            text: "Это пример текста."
        },
        en: {
            fontLabel: "Select Font:",
            themeLabel: "Select Theme:",
            languageLabel: "Select Language:",
            text: "This is a sample text."
        }
    };

    document.getElementById('fontLabel').innerText = translations[language].fontLabel;
    document.getElementById('themeLabel').innerText = translations[language].themeLabel;
    document.getElementById('languageLabel').innerText = translations[language].languageLabel;
    document.getElementById('text').innerText = translations[language].text;
}
});

const colorButton = document.getElementById('colorButton');
colorButton.addEventListener('click', function() {
colorButton.classList.remove('color-animation');
void colorButton.offsetWidth; // Триггер для анимации
colorButton.classList.add('color-animation');
});
</script>
</body>
</html>
