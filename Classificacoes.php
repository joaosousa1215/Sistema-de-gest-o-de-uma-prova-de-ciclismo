<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificações</title>
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
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
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
            border-radius: 10px;
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
        .button-container {
            display: flex;
            justify-content: space-around;
            width: 90%;
            max-width: 433px;
            margin-bottom: 20px;
        }
        .button {
            width: 90px;
            padding: 5px;
            text-align: center;
            color: black;
            font-size: 20px;
            font-style: italic;
            font-weight: 700;
            background: #D9D9D9;
            border-radius: 23px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .button:hover {
            background-color: gold;
            color: white;
            transform: scale(1.05);
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
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .search-container input:hover {
            background-color: gold;
            color: white;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4);
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
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
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .back-button:hover {
            background-color: gold;
            transform: scale(1.1);
        }
        .back-button img {
            transform: rotate(-180deg);
        }
        @media (min-width: 768px) {
            .table-container {
                max-width: 1700px;
            }
            .header img {
                height: 200px;
                object-fit: cover;
            }
        }
    </style>
    <script>
        function showStage(stage) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'getStage?stage=' + stage, true); 
            xhr.onload = function () {
                if (this.status == 200) {
                    document.querySelector('tbody').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('Etapa').addEventListener('click', function() {
                showStage(1);
            });
            document.getElementById('Geral').addEventListener('click', function() {
                showStage(1);
            });
            document.getElementById('Equipas').addEventListener('click', function() {
                showStage(1);
            });
            document.getElementById('Etapa1').addEventListener('click', function() {
                showStage(1);
            });
            document.getElementById('Etapa2').addEventListener('click', function() {
                showStage(2);
            });
            document.getElementById('Etapa3').addEventListener('click', function() {
                showStage(3);
            });
            document.getElementById('Etapa4').addEventListener('click', function() {
                showStage(4);
            });
            document.getElementById('Etapa5').addEventListener('click', function() {
                showStage(5);
            });
        });

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
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="Fotos/Banner.png" alt="Banner">
        </div>
        <div class="title">Classificações</div>
        <div class="button-container">
            <div class="button" id="Etapa">Etapa</div>
            <div class="button" id="Geral">Geral</div>
            <div class="button" id="Equipas">Equipas</div>
        </div>
        <div class="button-container">
            <div class="button" id="Etapa1">Etapa 1</div>
            <div class="button" id="Etapa2">Etapa 2</div>
            <div class="button" id="Etapa3">Etapa 3</div>
            <div class="button" id="Etapa4">Etapa 4</div>
            <div class="button" id="Etapa5">Etapa 5</div>
        </div>
        <div class="search-container">
            <img src="Fotos/lupa 1.png" alt="Lupa">
            <input type="text" name="search" placeholder="Search">
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Nome do Ciclista</th>
                        <th>Tempo Total Etapas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">Selecione o tipo de classificação.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="arrowCircle" class="back-button">
            <img src="Fotos/Arrow Vector 0.png" alt="Back">
        </div>

        <script>

        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('arrowCircle').addEventListener('click', function() {
                let role = getCookie('Role');
                if(role !== "0") // De acordo com o Role redireciona para a interface pretendida
                    window.location.href = "Interface Inicial role.php";
                else 
                    window.location.href = "Interface Inicial.html";
            });
        });
    </script>
    </div>
</body>
</html>
