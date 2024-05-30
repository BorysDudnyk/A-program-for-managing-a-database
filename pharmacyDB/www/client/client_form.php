<!DOCTYPE html>
<html>
<head>
    <title>Управління базою даних Аптека</title>
</head>
<link rel="stylesheet" href="client_form.css">
<body>
    <h1>Управління таблицею Клієнти</h1>
    <form action="client.php" method="post">
        <label for="name">Ім'я:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="surname">Прізвище:</label><br>
        <input type="text" id="surname" name="surname"><br>
        <label for="address">Адреса:</label><br>
        <input type="text" id="address" name="address"><br>
        <label for="email">Електронна пошта:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="phone">Телефон:</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        <input type="submit" name="action" value="Додати">
        <input type="submit" name="action" value="Переглянути">
    </form>

    <h1>Видалення клієнта</h1>
    <form action="client.php" method="post">
        <label for="client_id">ID клієнта:</label><br>
        <input type="text" id="client_id" name="client_id"><br><br>
        <input type="submit" name="action" value="Видалити">
    </form>
    <br>
    <a href="../index.php" class="back-button">Повернутися на головну</a>
</body>
</html>
