<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>users</title>
</head>
<body>
    <h1>user_list</h1>
    <?php
        if (isset($_SESSION['data'])) {
            $data = $_SESSION['data'];
            if (count($data) > 0) {
                echo "<table>";
                echo "<thead><tr>";
                foreach (array_keys($data[0]) as $column) {
                    echo "<th>" . htmlspecialchars($column) . "</th>";
                }
                echo "</tr></thead>";
                echo "<tbody>";
                foreach ($data as $row) {
                    echo "<tr>";
                    foreach ($row as $k => $v) {
                        if ($k == "id") {
                            echo "<td><a href=\"http://localhost/get_user_menu.php?id=" . htmlspecialchars($v) . "\">" . htmlspecialchars($v) . "</a></td>";
                        } else {
                            echo "<td>" . htmlspecialchars($v) . "さんのデータ" ."</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>no data1</p>";
            }
            unset($_SESSION['data']);
        } else {
            echo "<p>no data2</p>";
        }
    ?>
</body>
</html>
