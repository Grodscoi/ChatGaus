<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}
main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 20px;
}
h1 {
  margin-bottom: 20px;
  color: #333;
}
form {
  display: flex;
  flex-direction: column;
  width: 300px;
}
input[type="text"],
input[type="password"],
input[type="file"] {
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type="submit"]:hover {
  background-color: #45a049;
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
    <main>
        <h1>Регистрация : </h1>
        <form action="home.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="email" name='email'><br>
            <input type="file" name="file1"><br>
            <input type="submit" name="button" value="Register">
        </form>
    </main>
    <footer>
        <p>@copy 2024</p>
        <a href ="$">Discord</a>
    </footer>
</body>
</html>