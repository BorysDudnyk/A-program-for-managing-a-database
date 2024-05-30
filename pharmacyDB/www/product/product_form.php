<!DOCTYPE html>
<html>
<head>
    <title>Управління базою даних Продукт</title>
</head>
<link rel="stylesheet" href="product_form.css">
<body>
    <h1>Управління таблицею Продукт</h1>
    <form action="product.php" method="post">
        <label for="name">Назва:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="manufacturer">Виробник:</label><br>
        <input type="text" id="manufacturer" name="manufacturer"><br>
        <label for="price">Ціна:</label><br>
        <input type="text" id="price" name="price"><br><br>
        <input type="submit" name="action" value="Створити">
        <input type="submit" name="action" value="Читати">
    </form>

    <h1>Видалення данних з таблиці</h1>
    <form action="product.php" method="post">
        <label for="id">ID Продукту:</label><br>
        <input type="text" id="id" name="id"><br><br>
        <input type="submit" name="action" value="Видалити">
    </form>
    <br>
    <a href="../index.php" class="back-button">Повернутися на головну</a>
</body>
</html>
