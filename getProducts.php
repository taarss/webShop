<?php
    include 'main.php';
    if (isset($_POST['get100'])) {
            $stmt = $con->prepare('SELECT * FROM products LIMIT 100');
            $stmt->execute();
            $result = $stmt->get_result();
            $categories = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $json=json_encode($categories);
            echo $json;
        }
    if (isset($_POST['getFromCategory'])) {
            $stmt = $con->prepare('SELECT * FROM products WHERE type = ?');
            $stmt->bind_param('s', $_POST['category']);
            $stmt->execute();
            $result = $stmt->get_result();
            $categories = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $json=json_encode($categories);
            echo $json;
    }