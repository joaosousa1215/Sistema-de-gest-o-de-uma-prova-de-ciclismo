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
                    //$type = $_GET['type'];
                    $stage = $_GET['stage'];
                    
                    if ($stage == 1) {
                        $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
                                    FROM Etapa_$stage
                                    JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";
                    } else if ($stage == 2) {
                         $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
                                    FROM Etapa_$stage
                                    JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";
                    } else if ($stage == 3) {
                        $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
                                    FROM Etapa_$stage
                                    JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";
                    } else if ($stage == 4) {
                        $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
                                    FROM Etapa_$stage
                                    JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";
                    } else if ($stage == 5) {
                        $sql = "SELECT Etapa_$stage.Posição_Etapa_$stage, Atleta.Nome, Atleta.id AS idAtleta, Etapa_$stage.Tempo 
                                    FROM Etapa_$stage
                                    JOIN Atleta ON Etapa_$stage.idAtleta = Atleta.id";
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
                                <td>" . $row["Tempo"] . "</td>
                            </tr>";
                        }   
                    $conn->close();
                    exit();

                

                    ?>