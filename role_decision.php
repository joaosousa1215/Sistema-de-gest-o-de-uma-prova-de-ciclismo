<?php
    session_start(); // Inicia a sessão

    // Verifica se o usuário está logado
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo "<script>alert('Acesso negado. Faça login para continuar.'); window.location.href = 'Login.html';</script>";
        exit;
    }

    if (isset($_COOKIE["Role"])) {
        $role = $_COOKIE["Role"];
        if($role == 1){
            header("Location: ./Dashboard/Gestor_de_Prova/Gestor_de_Prova.php");
            exit();
        } elseif ($role == 2){
            header("Location: ./Dashboard/Gestor_da_Fantasy/Gestor_Fantasy.php");
            exit();
        } elseif ($role == 3){
            header("Location: ./Dashboard/Administrador/Administrador.php");
            exit();
        }
    } else {
        echo "Cookie 'Role' is not set!";
    }

    
?>