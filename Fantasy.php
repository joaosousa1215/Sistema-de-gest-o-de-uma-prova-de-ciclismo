<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Acesso negado. Faça login para continuar.'); window.location.href = 'Login.html';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
    <div class="Section16" style="width: 360px; height: 800px; background: #032383">
        <img class="Z3snnqskliwpnwjflqrqmsql2"
            style="width: 360px; height: 143px; left: 0px; top: 0px; position: absolute; opacity: 0.80"
            src="Fotos/Banner.png" />
        <div class="Fantasy"
            style="width: 361px; height: 17px; left: 0px; top: 111px; position: absolute; text-align: center; color: white; font-size: 24px;  font-style: italic; font-weight: 700; word-wrap: break-word">
            Fantasy</div>
        <div class="Rectangle7"
            style="width: 132px; height: 148px; left: 114px; top: 238px; position: absolute; background: #D9D9D9; border-radius: 23px">
        </div>
        <div id= "escolher_ver_equipa" class="EscolheATuaEquipa"
            style="width: 86px; height: 43px; left: 138px; top: 293px; position: absolute; text-align: center; color: black; font-size: 16px;  font-weight: 500; word-wrap: break-word">
            Escolher/ver a equipa</div>

            <div class="Rectangle8"
            style="width: 132px; height: 146px; left: 114px; top: 399px; position: absolute; background: #D9D9D9; border-radius: 23px">
        </div>
        <a href="Fantasy/Classificacoes.php" style="text-decoration: none;">
            <div class="ClassificaODosUtilizadores"
                style="width: 110px; height: 61px; left: 126px; top: 445px; position: absolute; text-align: center; color: black; font-size: 16px;  font-weight: 500; word-wrap: break-word">
                Classificação dos utilizadores</div>
        </a>
            <div class="Rectangle9"
            style="width: 132px; height: 147px; left: 114px; top: 559px; position: absolute; background: #D9D9D9; border-radius: 23px">
        </div>
        <a href="Fantasy/Pontos Por Ciclista.php" style="text-decoration: none;">
            <div class="PontosPorCiclista"
                style="width: 106px; height: 76px; left: 126px; top: 614px; position: absolute; text-align: center; color: black; font-size: 16px;  font-weight: 500; word-wrap: break-word">
                Pontos por ciclista</div>
        </a>
        <div class="Rectangle10"
            style="width: 21px; height: 657px; left: 0px; top: 143px; position: absolute; background: #CDC43D"></div>
        <div class="Rectangle11"
            style="width: 19px; height: 657px; left: 21px; top: 143px; position: absolute; background: #CDD2E6"></div>
        <div class="Rectangle12"
            style="width: 20px; height: 657px; left: 40px; top: 143px; position: absolute; background: #CDC43D"></div>
        <div class="Rectangle13"
            style="width: 20px; height: 657px; left: 60px; top: 143px; position: absolute; background: #CDD2E6"></div>
        <div class="Rectangle14"
            style="width: 20px; height: 657px; left: 80px; top: 143px; position: absolute; background: #CDC43D"></div>
        <div class="Rectangle15"
            style="width: 20px; height: 657px; left: 260px; top: 143px; position: absolute; background: #CDC43D"></div>
        <div class="Rectangle16"
            style="width: 20px; height: 657px; left: 280px; top: 143px; position: absolute; background: #CDD2E6"></div>
        <div class="Rectangle17"
            style="width: 20px; height: 657px; left: 300px; top: 143px; position: absolute; background: #CDC43D"></div>
        <div class="Rectangle18"
            style="width: 19px; height: 657px; left: 320px; top: 143px; position: absolute; background: #CDD2E6"></div>
        <div class="Rectangle19"
            style="width: 21px; height: 657px; left: 339px; top: 143px; position: absolute; background: #CDC43D"></div>


        <div id="arrowCircle" class="ArrowCircle" style="width: 34px; height: 34px; left: 11px; top: 10px; position: absolute; background: black; border-radius: 9999px"></div>
        <img class="ArrowVector3" style="width: 20px; height: 12px; left: 38px; top: 33px; position: absolute; transform: rotate(-180deg); transform-origin: 0 0" src="Fotos/Arrow Vector 0.png" />
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
            let role = getCookie('Role');
            if(role !== "0") //De acordo com o Role redireciona para a interface pretendida
                window.location.href = "Interface Inicial role.php";
            else 
                window.location.href = "Interface Inicial.html";
        });

        document.getElementById('escolher_ver_equipa').addEventListener('click', function() {
            let userid = getCookie('userid');

            fetch('Fantasy/check_if_team_exists.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'userid=' + encodeURIComponent(userid)
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "exists") {
                    window.location.href = "Fantasy/Tua_Equipa.php";
                } else {
                    window.location.href = "Fantasy/Equipa.php";
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>

    </body>
</html>