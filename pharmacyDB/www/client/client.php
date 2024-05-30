<link rel="stylesheet" href="client.css">

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
    $surname = isset($_POST["surname"]) ? $_POST["surname"] : null;
    $address = isset($_POST["address"]) ? $_POST["address"] : null;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $client_id = isset($_POST["client_id"]) ? $_POST["client_id"] : null;
    $action = $_POST["action"];

    switch ($action) {
        case "Додати":
            
            $sql = "INSERT INTO клієнт (Ім_я, Прізвище, Адреса, Електронна_пошта, Телефон) VALUES (?, ?, ?, ?, ?)";

            
            $stmt = $conn->prepare($sql);

            
            if ($stmt === false) {
                die("Помилка підготовленого запиту: " . $conn->error);
            }

            
            $stmt->bind_param("sssss", $name, $surname, $address, $email, $phone);

            
            if ($stmt->execute()) {
                echo "<h2>Новий запис успішно додано</h2><br>";
            } else {
                echo "Помилка: " . $sql . "<br>" . $conn->error;
            }

            
            $stmt->close();
            echo '<br><a href="client_form.php" class="back-button">Повернутися назад</a>';
            break;

        case "Переглянути":
            $sql = "SELECT * FROM клієнт";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h2>Список клієнтів:</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Ім'я</th>
                            <th>Прізвище</th>
                            <th>Адреса</th>
                            <th>Електронна пошта</th>
                            <th>Телефон</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["ID_клієнта"] . "</td>
                            <td>" . $row["Ім_я"] . "</td>
                            <td>" . $row["Прізвище"] . "</td>
                            <td>" . $row["Адреса"] . "</td>
                            <td>" . $row["Електронна_пошта"] . "</td>
                            <td>" . $row["Телефон"] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>0 результатів</h2>";
            }
            echo '<br><a href="client_form.php" class="back-button">Повернутися назад</a>';
            break;

        case "Видалити":
            $sql = "DELETE FROM клієнт WHERE ID_клієнта=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $client_id);
            if ($stmt->execute()) {
                echo "<h2>Запис успішно видалено</h2><br>";
            } else {
                echo "Помилка: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
            echo '<br><a href="client_form.php" class="back-button">Повернутися назад</a>';
            break;
    }
}

$conn->close();
?>
