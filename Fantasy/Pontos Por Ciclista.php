<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pontos por Ciclista</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .Rectangle9 {
            width: 330px;
            height: 495px;
            left: 15px;
            top: 284px;
            position: absolute;
            background: #D9D9D9;
            overflow: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #032383;
            color: white;
        }
    </style>
</head>

<div class="Section24" style="width: 360px; height: 800px; background: #032383; position: relative;">
    <img class="Z3snnqskliwpnwjflqrqmsql2"
        style="width: 360px; height: 143px; left: 0px; top: 0px; position: absolute; opacity: 0.80"
        src="Fotos Fantasy/Banner.png" />
    <div class="PontosPorCiclista"
        style="width: 361px; height: 17px; left: 0px; top: 111px; position: absolute; text-align: center; color: white; font-size: 24px;  font-style: italic; font-weight: 700; word-wrap: break-word">
        Pontos por Ciclista</div>
    <div class="Rectangle9" style="width: 330px; height: 619px; left: 15px; top: 160px; position: absolute; background: #D9D9D9">

    <table id='PontosTable'>
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Nome do Ciclista</th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody>
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


                $sql = "SELECT * FROM Atleta"; //INSERT INTO `Lista_de_Saída` (Posição, Atleta, Equipa) VALUES ('1', 'Xavi', 'Nome da equipa');

                $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    //Read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>" . $row["Posição"] . "</td>
                            <td>" . $row["Nome"] . "</td>
                            <td>" . $row["Pontos"] . "</td>
                        </tr>";
                    }
                ?>         
            </tbody>
        </table>

    </div>
    
    <a href="../Fantasy.php" style="text-decoration: none;">
        <div class="ArrowCircle"
            style="width: 34px; height: 34px; left: 11px; top: 10px; position: absolute; background: black; border-radius: 9999px">
        </div>
        <img class="ArrowVector3"
            style="width: 20px; height: 12px; left: 38px; top: 33px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0"
            src="Fotos Fantasy/Arrow Vector 0.png" />
        </div>
    </a>
