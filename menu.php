    <?php
if (!isset($_SESSION['usuario_cod'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header("Location: logar.php");
}?>
