<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Saída</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background: #032383;
        }
        .header {
            width: 100%;
            height: auto;
            position: relative;
        }
        .header img {
            width: 100%;
            height: auto;
            display: block;
            opacity: 0.80;
        }
        .title {
            text-align: center;
            color: white;
            font-size: 24px;
            font-style: italic;
            font-weight: 700;
            word-wrap: break-word;
            margin: 20px 0;
        }
        .search-container {
            width: 90%;
            max-width: 333px;
            position: relative;
            margin-bottom: 20px;
        }
        .search-container input {
            width: 100%;
            padding: 8px 12px 8px 35px;
            border: none;
            border-radius: 23px;
            background: #D9D9D9;
            box-sizing: border-box;
        }
        .search-container img {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
        }
        .table-container {
            width: 90%;
            max-width: 330px;
            background: #D9D9D9;
            border-radius: 10px;
            overflow: auto;
            margin-bottom: 20px;
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
        .back-button {
            position: fixed;
            top: 10px;
            left: 10px;
            background: black;
            border-radius: 50%;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .back-button img {
            transform: rotate(-180deg);
        }
        @media (min-width: 768px) {
            .table-container {
                max-width: 1700px;
            }
            .header img {
                height: 200px; /* Define a height for the banner image on larger screens */
                object-fit: cover; /* Ensures the image covers the defined height without distorting */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="Fotos/Banner.png" alt="Banner">
        </div>
        <div class="title">Lista de Saída</div>
        <form method="GET" action="" class="search-container">
            <img src="Fotos/lupa 1.png" alt="Lupa">
            <input type="text" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        </form>
        <div class="table-container">
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

                    $sql = "SELECT Atleta.Nome, Atleta.Equipa
                    FROM Lista_de_Saída
                    JOIN Atleta ON Lista_de_Saída.idAtleta = Atleta.id
                    JOIN Equipa ON Lista_de_Saída.idEquipa = Equipa.id";

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
        <div id="arrowCircle" class="back-button">
            <img src="Fotos/Arrow Vector 0.png" alt="Back">
        </div>
    </div>

    <script>
        function getCookie(name) {
            let cookieArr = document.cookie.split(";");
            for(let i = 0; i < cookieArr.length; i++) {
                let cookiePair = cookieArr[i].split("=");
                if(name == cookiePair[0].trim()) {
                    return decodeURIComponent(cookiePair[1]);
                }
            }
            return null;
        }

        document.getElementById('arrowCircle').addEventListener('click', function() {
            $role = getCookie('Role');
            if($role !== 0) //De acordo com o Role redireciona para a interface pretendida
                window.location.href = "Interface Inicial role.php";
            else 
                window.location.href = "Interface Inicial.html";
        });
    </script>
</body>
</html>
