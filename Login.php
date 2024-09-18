<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se email e password não estão vazios
    if (empty($email) || empty($password)) {
        echo "Email e password são obrigatórios!";
        exit;
    }

    // Database connection
    $servername = 'ave.dee.isep.ipp.pt';
    $username = '1201034';
    $dbpassword = 'MWY2MzMxMDdiMWQ2';
    $dbname = '1201034';

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Consulta SQL para verificar o usuário
        $stmt = $conn->prepare("SELECT * FROM registration_sign_up WHERE email_sign_up = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $email);  // Sincroniza o email ao parâmetro na consulta
        $stmt->execute();                // Executa a consulta
        $result = $stmt->get_result();   // Obtém o resultado da consulta
       

        
        if ($result->num_rows > 0) {
            // Usuário encontrado, verificar senha
            $row = $result->fetch_assoc();  // Obtém os dados do usuário
            $stored_password = $row['password_sign_up'];
            $userid = $row['id'];
            $role = $row['Role'];
            if (password_verify($password, $stored_password)) { // Verifica a senha
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                               
                // Nota: Por motivos de segurança não se deve guardar a password
                $cookie = setcookie('userid', $userid, time() + (3600), "/"); // 3600 = 1h
                $cookie = setcookie('Role', $role, time() + (3600), "/"); // 3600 = 1h
                if ($cookie){ //Valida se a cookie foi criada corretamente
                    if ($role === 0)
                        echo "<script>window.location.href = 'Interface Inicial.html'</script>"; //caso tenha role de utililador
                    else echo "<script>window.location.href = 'Interface Inicial role.php'</script>"; //caso tenha um role especial (gestor)
                }
                } else {
                    echo "<script>alert('Senha incorreta!'); window.location.href = 'Login.html'</script>";
                }
                } else {
                    echo "<script>alert('Utilizador não encontrado!'); window.location.href = 'Login.html'</script>";
                }
        
        $stmt->close();
        $conn->close();
    }
}
?>

