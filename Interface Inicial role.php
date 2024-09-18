<?php
  /*session_start(); // Inicia a sessão

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_COOKIE['username'])) {
        //echo "Welcome, " . htmlspecialchars($_COOKIE['username']) . "!";
        echo "<script>alert('Acesso negado. Faça login para continuar.')</script>";
    } else {
        echo "Cookie not set.";
    }
  }
  */
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface Inicial</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,wght@1,700&display=swap');

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 110vh;
  background-color: #FFFF01;
}

.Section8 {
  width: 100%;
  max-width: 360px;
  height: 100%;
  max-height: 800px;
  background: white;
  position: relative;
  overflow: hidden;
}

.Rectangle5 {
  width: 100%;
  height: 65.75%;
  background: #FFFF01;
  position: absolute;
  bottom: 0;
}

.Rectangle1, .Rectangle2, .Rectangle3, .Rectangle4 {
  width: 37.5%;
  height: 18.5%;
  position: absolute;
  background: black;
  border-radius: 25px;
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.Rectangle1 {
  left: 55%;
  top: 43.625%;
}

.Rectangle2 {
  left: 55%;
  top: 69.875%;
}

.Rectangle3 {
  left: 6.39%;
  top: 43.625%;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  border: 1px black solid;
}

.Rectangle4 {
  left: 6.39%;
  top: 69.875%;
}

.Rectangle1:hover, .Rectangle2:hover, .Rectangle3:hover, .Rectangle4:hover {
  transform: scale(1.05);
  background-color: #333;
}

.Fantasy, .PerfilDaEtapa, .ListaDeSaDa, .ClassicaEs {
  width: 26.94%;
  height: 4%;
  position: absolute;
  text-align: center;
  color: white;
  font-size: 2vh;
  font-family: 'Inter', sans-serif;
  font-style: italic;
  font-weight: 700;
  word-wrap: break-word;
  transition: transform 0.3s ease, color 0.3s ease;
}

.Fantasy:hover, .PerfilDaEtapa:hover, .ListaDeSaDa:hover, .ClassicaEs:hover {
  transform: scale(1.1);
  color: #FFFF01;
}

.Fantasy {
  left: 60.56%;
  top: 50.875%;
}

.PerfilDaEtapa {
  width: 37.5%;
  left: 6.39%;
  top: 77.25%;
}

.ListaDeSaDa {
  width: 37.5%;
  left: 55.28%;
  top: 77.25%;
}

.ClassicaEs {
  left: 11.94%;
  top: 50.875%;
}

.Letour1 {
  width: 100%;
  height: 34.25%;
  position: absolute;
  top: 0;
  left: 0;
}

.Group7 {
  width: 11.11%;
  height: 5%;
  position: absolute;
  left: 5.28%;
  top: 1.75%;
}

.Ellipse1 {
  width: 100%;
  height: 100%;
  background: white;
  border-radius: 9999px;
  border: 2px black solid;
  position: absolute;
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.Group7:hover .Ellipse1 {
  transform: scale(1.1);
  background-color: #FFFF01;
}

.Image1 {
  width: 4.44%;
  height: 2%;
  position: absolute;
  left: 20.83%;
  top: 3.125%;
  transition: transform 0.3s ease;
}

.Group7 img {
  width: 40%;
  height: 40%;
  left: 30%;
  top: 30%;
  position: absolute;
}

.Group7:hover img, .Image1:hover {
  transform: scale(1.2);
}

.EditButton {
  width: 4.44%;
  height: 2.5%;
  position: absolute;
  left: 90.5%;
  top: 6%;
  transition: transform 0.3s ease;
}

.EditButton:hover {
  transform: scale(1.2);
}

@media (max-width: 768px) {
  .Fantasy, .PerfilDaEtapa, .ListaDeSaDa, .ClassicaEs {
    font-size: 1.5vh;
  }
}

@media (max-width: 480px) {
  .Fantasy, .PerfilDaEtapa, .ListaDeSaDa, .ClassicaEs {
    font-size: 2vh;
  }
}

.goog-te-banner-frame {
  display: none !important;
}

.goog-te-menu-value {
  color: black !important;
}

.goog-te-gadget-icon {
  display: none !important;
}

.goog-te-gadget-simple {
  background-color: white !important;
  border: 1px solid black !important;
  border-radius: 5px;
  padding: 5px;
  cursor: pointer;
  font-family: Arial, sans-serif;
  display: flex;
  align-items: center;
  position: absolute;
  top: 10px;
  right: 10px;
}
  </style>
</head>

<body>
  <div class="Section8">
    <div class="Rectangle5"></div>
    <div class="Rectangle1"></div>
    <div class="Rectangle4"></div>
    <div class="Rectangle3"></div>
    <div class="Rectangle2"></div>

    <a href="Fantasy.php" style="text-decoration: none;">
      <div class="Fantasy">Fantasy</div>
    </a>
    <a href="Perfil da Etapa.html" style="text-decoration: none;">
      <div class="PerfilDaEtapa">Perfil da etapa</div>
    </a>
    <a href="Lista de Saida.php" style="text-decoration: none;">
      <div class="ListaDeSaDa">Lista de saída</div>
    </a>
    <a href="Classificacoes.php" style="text-decoration: none;">
      <div class="ClassicaEs">Classicações</div>
    </a>
    <img class="Letour1" src="Fotos/Tour de France.png" />
    
    <a href="Login.html" style="text-decoration: none;">
      <div class="Group7">
        <div class="Ellipse1">
          <img src="Fotos/icone login 16x16.png" />
        </div>
      </div>
    </a>
    <a href="Logout.php" style="text-decoration: none;">
      <img class="Image1" src="Fotos/logout.png" />
    </a>
    
    <a href="role_decision.php" style="text-decoration: none;">
      <img class="EditButton" src="Fotos/edit_button.png" />
    </a>

    <div id="google_translate_element"></div>
  </div>

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'pt',
        includedLanguages: 'en,fr,pt', // Adicione mais idiomas conforme necessário
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  
</body>

    <script>
    function handleClick(event) {
        event.preventDefault(); //Previne a submissão por defeito do Form
        /*let username = getCookie("username");
        if(){

        }*/
        
        

    }
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

    //let role = getCookie("Role");
    //alert(role);
    // Retrieve the cookie
    /*window.onload = function() {
        let username = getCookie("username");
        if (username) {
            document.getElementById("username").innerText = "Username: " + username;
            alert(username);
        } else {
            document.getElementById("username").innerText = "Cookie 'username' is not set!";
        } 
        };*/
</script>
</html>

