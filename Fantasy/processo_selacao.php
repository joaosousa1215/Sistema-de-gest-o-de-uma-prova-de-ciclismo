<?php
//Inicia a sessão
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['selected_cyclists'])) {
        $selectedCyclists = explode(",", $_POST['selected_cyclists']);

        // Check if exactly 5 cyclists were selected
        if (count($selectedCyclists) !== 5) {
            die("You must select exactly 5 cyclists.");
        }

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

        // Fetch the IDs of the selected cyclists
        $namePlaceholders = "'" . implode("','", $selectedCyclists) . "'";
        $sql = "SELECT id, Nome FROM Atleta WHERE Nome IN ($namePlaceholders)";
        $result = $conn->query($sql);

        if (!$result) {
            die("Invalid query: " . $conn->error);
        }

        $ids = [];
        while ($row = $result->fetch_assoc()) {
            $ids[$row['Nome']] = $row['id'];
        }

        // Check if we got exactly 5 IDs
        if (count($ids) !== 5) {
            die("Could not find IDs for exactly 5 cyclists.");
        }

        // Prepare the IDs for insertion
        $idArray = array_values($ids);
        $idAtleta_1 = $idArray[0];
        $idAtleta_2 = $idArray[1];
        $idAtleta_3 = $idArray[2];
        $idAtleta_4 = $idArray[3];
        $idAtleta_5 = $idArray[4];

        // Check if the userid cookie is set
        if (isset($_COOKIE['userid'])) {
            // Retrieve the userid from the cookie
            $userid = $_COOKIE['userid'];

        // Insert selected cyclists into the Fantasy Equipa table
        $insert_sql = "INSERT INTO `Fantasy Equipa` (idAtleta_1, idAtleta_2, idAtleta_3, idAtleta_4, idAtleta_5, user_id) VALUES ($idAtleta_1, $idAtleta_2, $idAtleta_3, $idAtleta_4, $idAtleta_5, $userid)";
        if (!$conn->query($insert_sql)) {
            die("Insert failed: " . $conn->error);
        }

        $conn->close();
        
        echo "<script>alert('Equipa submetida com sucesso!'); window.location.href = '../Fantasy.php'</script>";
    } else {
        echo "No cyclists selected.";
    }
}
}
?>
