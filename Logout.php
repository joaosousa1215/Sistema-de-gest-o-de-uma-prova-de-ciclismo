<?php
session_start();
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destroi a sessão

echo "<script>alert('Logout realizado com sucesso.'); window.location.href = 'Interface Inicial.html';</script>";
?>
