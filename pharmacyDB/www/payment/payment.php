<link rel="stylesheet" href="payment.css">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pharmacy";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}


$conn->set_charset("utf8");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sum = isset($_POST["sum"]) ? $_POST["sum"] : null;
    $payment_id = isset($_POST["payment_id"]) ? $_POST["payment_id"] : null;
    $action = $_POST["action"];

    switch ($action) {
        case "Створити":
            $sql = "INSERT INTO оплата (Сума, Дата_оплати) VALUES (?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("d", $sum);
            if ($stmt->execute()) {
                echo "<h2>Новий запис оплати успішно створено</h2>";
            } else {
                echo "Помилка: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
            echo '<br><a href="payment_form.php" class="back-button">Повернутися назад</a>';
            break;

        case "Читати":
            $sql = "SELECT * FROM оплата";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h2>Список оплат:</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Сума</th>
                            <th>Дата оплати</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["ID_оплата"] . "</td>
                            <td>" . $row["Сума"] . "</td>
                            <td>" . $row["Дата_оплати"] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>0 результатів</h2>";
            }
            echo '<br><a href="payment_form.php" class="back-button">Повернутися назад</a>';
            break;

        case "Видалити":
            $sql = "DELETE FROM оплата WHERE ID_оплата=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $payment_id);
            if ($stmt->execute()) {
                echo "<h2>Запис оплати успішно видалено</h2>";
            } else {
                echo "Помилка: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
            echo '<br><a href="payment_form.php" class="back-button">Повернутися назад</a>';
            break;
    }
}

$conn->close();
?>
