<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = 'ave.dee.isep.ipp.pt';
    $username = '1201034';
    $dbpassword = 'MWY2MzMxMDdiMWQ2';
    $dbname = '1201034';

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_POST['userid'];

    // Direct query
    $sql = "SELECT COUNT(*) AS count FROM `Fantasy Equipa` WHERE user_id = $userid";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        if ($row['count'] > 0) {
            echo "exists";
        } else {
            echo "not_exists";
        }
    } else {
        echo "not_exists";
    }

    $conn->close();
}
?>
