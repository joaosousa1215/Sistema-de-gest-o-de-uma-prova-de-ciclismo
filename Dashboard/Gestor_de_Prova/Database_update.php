<?php
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

// Get the data from the request
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    foreach ($data as $row) {
        $posicao = $row['posicao'];
        $nome = $row['nome'];
        $tempo = $row['tempo'];

        // Update the database with the new data
        $sql = "UPDATE Atleta JOIN Etapa_$stage ON Atleta.id = Etapa_$stage.idAtleta
                SET Etapa_$stage.Posição_Etapa_$stage = '$posicao', Atleta.Nome = '$nome', Etapa_$stage.Tempo = '$tempo'
                WHERE Atleta.Nome = '$nome'";
    
        if (!$conn->query($sql)) {
            die("Error updating record: " . $conn->error);
        }
    }
    echo "Records updated successfully";
} else {
    echo "No data received";
}


$conn->close();
?>
