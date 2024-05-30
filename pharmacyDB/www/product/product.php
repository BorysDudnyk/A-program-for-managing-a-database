<link rel="stylesheet" href="product.css">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pharmacy";


$conn = new mysqli($servername, $username, $password, $dbname);


$conn->set_charset("utf8");


if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $manufacturer = isset($_POST["manufacturer"]) ? $_POST["manufacturer"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $action = $_POST["action"];

    switch ($action) {
        case "Створити":
            
            $sql = "INSERT INTO продукт (Назва, Виробник, Ціна) VALUES (?, ?, ?)";

            
            $stmt = $conn->prepare($sql);

            
            if ($stmt === false) {
                die("Помилка підготовленого запиту: " . $conn->error);
            }

            
            $stmt->bind_param("ssd", $name, $manufacturer, $price);

            
            if ($stmt->execute()) {
                echo "<h2>Новий запис успішно створено<h2><br>";
            } else {
                echo "Помилка: " . $sql . "<br>" . $conn->error;
            }

            
            $stmt->close();
            echo '<br><a href="product_form.php" class="back-button">Повернутися назад</a>';
            break;

        case "Читати":
            $sql = "SELECT * FROM продукт";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h2>Список продуктів:</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th>Виробник</th>
                            <th>Ціна</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["ID_продукту"] . "</td>
                            <td>" . $row["Назва"] . "</td>
                            <td>" . $row["Виробник"] . "</td>
                            <td>" . $row["Ціна"] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>0 результатів<h2>";
            }
            echo '<br><a href="product_form.php" class="back-button">Повернутися назад</a>';
            break;

        case "Видалити":
            
            $sql = "DELETE FROM продукт WHERE ID_продукту=?";

            
            $stmt = $conn->prepare($sql);

            
            if ($stmt === false) {
                die("Помилка підготовленого запиту: " . $conn->error);
            }

            
            $stmt->bind_param("i", $id);

            
            if ($stmt->execute()) {
                echo "<h2>Запис успішно видалено</h2><br>";
            } else {
                echo "Помилка: " . $sql . "<br>" . $conn->error;
            }

            
            $stmt->close();
            echo '<br><a href="product_form.php" class="back-button">Повернутися назад</a>';
            break;
    }
}

$conn->close();
?>
