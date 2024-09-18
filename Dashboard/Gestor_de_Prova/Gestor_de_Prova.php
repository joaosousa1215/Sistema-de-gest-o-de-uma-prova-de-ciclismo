<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Prova</title>
    <link rel="stylesheet" href="../../styles.css">
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

        input {
            width: 90%;
            padding: 2px;
            font-size: 12px;
            text-align: center;
        }
        .delete-button, .add-button {
            background-color: red;
            color: white;
            border: none;
            padding: 4px;
            cursor: pointer;
        }
        .add-button {
            background-color: green;
            margin-top: 10px;
        }

    </style>

        <script>
                function showStage(stage) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'Change_database_dashboard.php?stage=' + stage, true);
                    xhr.onload = function () {
                        if (this.status == 200) {
                            document.querySelector('tbody').innerHTML = this.responseText;
                        }
                    };
                    xhr.send();
                }
                
                document.addEventListener('DOMContentLoaded', function() {
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

                function deleteRow(row) {
                    row.parentNode.removeChild(row);
                }


                function submitChanges() {
                    var table = document.querySelector('tbody');
                    var rows = table.getElementsByTagName('tr');
                    var data = [];
                    
                    for (var i = 0; i < rows.length; i++) {
                        var cells = rows[i].getElementsByTagName('td');
                        var rowData = {
                            posicao: cells[0].querySelector('input').value,
                            nome: cells[1].querySelector('input').value,
                            tempo: cells[2].querySelector('input').value
                        };
                        data.push(rowData);
                    }

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'Database_update.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.onload = function () {
                        if (this.status == 200) {
                            alert('Dados atualizados com sucesso');
                        } else {
                            alert('Erro ao atualizar dados');
                        }
                    };
                    xhr.send(JSON.stringify(data));
                }
            </script>

    </head>

    <body>
        <div class="Section25" style="width: 360px; height: 800px; background: #032383; position: relative;">
            <img class="Z3snnqskliwpnwjflqrqmsql2"
                style="width: 360px; height: 143px; left: 0px; top: 0px; position: absolute; opacity: 0.80"
                src="../../Fotos/Banner.png" />
            <div class="Frame13"
                style="width: 361px; height: 17px; left: 0px; top: 111px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                <div class="Dashboard"
                    style="width: 361px; height: 17px; text-align: center; color: white; font-size: 24px;  font-style: italic; font-weight: 700; word-wrap: break-word">
                    Gestor de Prova</div>
            </div>
            <div class="Rectangle10"
                style="width: 360px; height: 39px; left: 0px; top: 143px; position: absolute; background: #D9D9D9"></div>
            <div class="Frame12" style="width: 630px; height: 22px; left: -56px; top: 153px; position: absolute">
                <div class="Etapa1" id="Etapa1" onclick="showStage(1)"
                    style="width: 64px; height: 38px; left: 62px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                    Etapa 1</div>
                <div class="Etapa2" id="Etapa1" onclick="showStage(2)"
                    style="width: 66px; height: 38px; left: 130px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                    Etapa 2</div>
                <div class="Etapa3" id="Etapa1" onclick="showStage(3)"
                    style="width: 66px; height: 38px; left: 200px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                    Etapa 3</div>
                <div class="Etapa4" id="Etapa1" onclick="showStage(4)"
                    style="width: 71px; height: 38px; left: 270px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                    Etapa 4</div>
                <div class="Etapa5" id="Etapa1" onclick="showStage(5)"
                    style="width: 69px; height: 38px; left: 341px; top: 0px; position: absolute; text-align: center; color: black; font-size: 16px;  font-style: italic; font-weight: 700; word-wrap: break-word; cursor: pointer;">
                    Etapa 5</div>

            </div>
            <div class="Rectangle9" style="width: 330px; height: 577px; left: 15px; top: 194px; position: absolute; background: #D9D9D9">
            <table>
                        <thead>
                            <tr>
                                <th>Posição</th>
                                <th>Nome do Ciclista</th>
                                <th>Tempo Total Etapas</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">Selecione a Etapa.</td>
                            </tr>
                        </tbody>
                    </table>
                    <button onclick="submitChanges()">Submeter Alterações</button>
            </div>
            
            <a href="../../Interface Inicial.html" style="text-decoration: none;">
            <div class="ArrowCircle"
                style="width: 34px; height: 34px; left: 15px; top: 9px; position: absolute; background: black; border-radius: 9999px">
            </div>
            <img class="ArrowVector3"
                style="width: 20px; height: 12px; left: 42px; top: 32px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0"
                src="../../Fotos/Arrow Vector 0.png" />
            </a>

            <div id="arrowCircle" class="ArrowCircle" style="width: 34px; height: 34px; left: 11px; top: 10px; position: absolute; background: black; border-radius: 9999px"></div>
            <img class="ArrowVector3" style="width: 20px; height: 12px; left: 38px; top: 33px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0" src="../../Fotos/Arrow Vector 0.png" />
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
                window.location.href = "../../Interface Inicial role.php";
            else 
                window.location.href = "../../Interface Inicial.html";
        });
        </script>
    </body>
</html>