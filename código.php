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

$type = $_GET['type'];
$stage = $_GET['stage'];

// SQL para classificação geral
if ($type == 'Geral') {
    if ($stage == 1) {
        $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
                FROM Etapa_$stage
                JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";
    } else if ($stage == 2) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else if ($stage == 3) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo + Etapa_3.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                LEFT JOIN Etapa_3 ON Atleta.id = Etapa_3.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else if ($stage == 4) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo + Etapa_3.Tempo + Etapa_4.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                LEFT JOIN Etapa_3 ON Atleta.id = Etapa_3.idAtleta
                LEFT JOIN Etapa_4 ON Atleta.id = Etapa_4.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else if ($stage == 5) {
        $sql = "SELECT Atleta.id AS idAtleta, Atleta.Nome, 
                SEC_TO_TIME(SUM(TIME_TO_SEC(Etapa_1.Tempo + Etapa_2.Tempo + Etapa_3.Tempo + Etapa_4.Tempo + Etapa_5.Tempo))) AS TempoTotal 
                FROM Atleta
                LEFT JOIN Etapa_1 ON Atleta.id = Etapa_1.idAtleta
                LEFT JOIN Etapa_2 ON Atleta.id = Etapa_2.idAtleta
                LEFT JOIN Etapa_3 ON Atleta.id = Etapa_3.idAtleta
                LEFT JOIN Etapa_4 ON Atleta.id = Etapa_4.idAtleta
                LEFT JOIN Etapa_5 ON Atleta.id = Etapa_5.idAtleta
                GROUP BY Atleta.id, Atleta.Nome
                ORDER BY TempoTotal ASC";
    } else {
        echo "Invalid stage";
        $conn->close();
        exit();
    }
    
    $result = $conn->query($sql);

        if (!$result) {
            die("Invalid query: " . $conn->error);
        }

        //Read data of each row
        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>" . $row["Posição_Etapa_$stage"] . "</td>
                <td>" . $row["Nome"] . "</td>
                <td>" . $row["TempoTotal"] . "</td>
            </tr>";
        }
} else if (in_array($stage, range(1, 5))) {
    // SQL para classificação por etapa
    $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
            FROM Etapa_$stage
            JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";

    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>" . $row["Posição_Etapa_$stage"] . "</td>
            <td>" . $row["Nome"] . "</td>
            <td>" . $row["Tempo"] . "</td>
        </tr>";
    }
} else {
    echo "Invalid type or stage";
}

$conn->close();
exit();
?>


