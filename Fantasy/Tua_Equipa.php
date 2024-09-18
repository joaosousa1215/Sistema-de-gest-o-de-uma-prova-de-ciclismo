<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tua Equipa</title>
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

<div class="Section28" style="width: 360px; height: 800px; background: #032383; position: relative;">
    <img class="Z3snnqskliwpnwjflqrqmsql2"
        style="width: 360px; height: 143px; left: 0px; top: 0px; position: absolute; opacity: 0.80"
        src="Fotos Fantasy/Banner.png" />
    <div class="Frame19"
        style="width: 361px; height: 17px; left: 0px; top: 111px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
        <div class="TuaEquipa"
            style="width: 361px; height: 17px; text-align: center; color: white; font-size: 24px;  font-style: italic; font-weight: 700; word-wrap: break-word">
            Tua Equipa</div>
    </div>
    <div class="Rectangle9" style="width: 330px; height: 614px; left: 15px; top: 157px; position: absolute; background: #D9D9D9">

    <table>
            <thead>
                <tr>
                    <th>Nome do Ciclista</th>
                    <th>Equipa</th>
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
                
                // Captura da Entrada de Pesquisa
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $search = $conn->real_escape_string($search);


                //$sql = "SELECT Atleta.Nome, Atleta.Equipa
                //FROM Lista_de_Saída
                //JOIN Atleta ON Lista_de_Saída.idAtleta = Atleta.id
                //JOIN Equipa ON Lista_de_Saída.idEquipa = Equipa.id";

                if (!empty($search)) {
                    $sql .= " WHERE `Nome` LIKE '%$search%'";
                }

                $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    //Read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>" . $row["Nome"] . "</td>
                            <td>" . $row["Equipa"] . "</td>
                        </tr>";
                    }
                ?>         
            </tbody>
        </table>


    </div>
    <div class="ArrowCircle"
        style="width: 34px; height: 34px; left: 15px; top: 9px; position: absolute; background: black; border-radius: 9999px">
    </div>
    <img class="ArrowVector3"
        style="width: 20px; height: 12px; left: 42px; top: 32px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0"
        src="Fotos Fantasy/Arrow Vector 0.png" />
</div>

