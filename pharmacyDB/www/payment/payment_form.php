<!DOCTYPE html>
<html>
<head>
    <title>Управління оплатою</title>
    <link rel="stylesheet" href="payment_form.css">
</head>
<body>
    <h1>Управління оплатою</h1>
    <form action="payment.php" method="post">
        <label for="sum">Сума:</label><br>
        <input type="text" id="sum" name="sum"><br><br>
        <input type="submit" name="action" value="Створити">
        <input type="submit" name="action" value="Читати">
    </form>

    <h1>Видалення оплати</h1>
    <form action="payment.php" method="post">
        <label for="payment_id">ID оплати:</label><br>
        <input type="text" id="payment_id" name="payment_id"><br><br>
        <input type="submit" name="action" value="Видалити">
    </form>
    <br>
    <a href="../index.php" class="back-button">Повернутися на головну</a>
</body>
</html>
