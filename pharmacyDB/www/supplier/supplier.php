<link rel="stylesheet" href="supplier.css">

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
    $address = isset($_POST["address"]) ? $_POST["address"] : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $action = $_POST["action"];

    switch ($action) {
        case "Додати":
            
            $sql = "INSERT INTO постачальник (Назва, Адреса, Телефон) VALUES (?, ?, ?)";

            
            $stmt = $conn->prepare($sql);

            
            if ($stmt === false) {
                die("Помилка підготовленого запиту: " . $conn->error);
            }

            
            $stmt->bind_param("sss", $name, $address, $phone);

            
            if ($stmt->execute()) {
                echo "<h2>Новий запис успішно додано</h2><br>";
            } else {
                echo "Помилка: " . $sql . "<br>" . $conn->error;
            }

            
            $stmt->close();
            echo '<br><a href="supplier_form.php" class="back-button">Повернутися назад</a>';
            break;

        case "Переглянути":
            $sql = "SELECT * FROM постачальник";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h2>Список постачальників:</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th>Адреса</th>
                            <th>Телефон</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["ID_постач"] . "</td>
                            <td>" . $row["Назва"] . "</td>
                            <td>" . $row["Адреса"] . "</td>
                            <td>" . $row["Телефон"] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>0 результатів</h2>";
            }
            echo '<br><a href="supplier_form.php" class="back-button">Повернутися назад</a>';
            break;
            case "Видалити":
                
                $sql = "DELETE FROM постачальник WHERE ID_постач=?";
    
                
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
                echo '<br><a href="supplier_form.php" class="back-button">Повернутися назад</a>';
                break;
        }
    }
    
    $conn->close();
    ?>
    