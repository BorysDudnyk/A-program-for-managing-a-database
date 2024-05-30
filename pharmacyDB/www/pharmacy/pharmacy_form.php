<!DOCTYPE html>
<html>
<head>
    <title>Управління базою даних Аптека</title>
</head>
<link rel="stylesheet" href="pharmacy_form.css">
<body>
    <h1>Управління таблицею Аптека</h1>
    <form action="pharmacy.php" method="post">
        <label for="name">Назва:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="address">Адреса:</label><br>
        <input type="text" id="address" name="address"><br>
        <label for="phone">Телефон:</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        <input type="submit" name="action" value="Створити">
        <input type="submit" name="action" value="Читати">
    </form>

    <h1>Видалення данних з таблиці</h1>
    <form action="pharmacy.php" method="post">
        <label for="id">ID Аптеки:</label><br>
        <input type="text" id="id" name="id"><br><br>
        <input type="submit" name="action" value="Видалити">
    </form>
    <br>
    <a href="../index.php" class="back-button">Повернутися на головну</a>
</body>
</html>