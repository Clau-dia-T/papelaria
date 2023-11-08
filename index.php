<?php

    require_once("importacoes.php");

    if(verificarLogado()){
        header("Location: home.php");
        exit();
    }

    $form = isset($_GET["login"]) && isset($_GET["senha"]);

    if($form){
        $login = $_GET["login"];
        $senha = $_GET["senha"];
        $login_valido = fazerLogin($login, $senha);
        if($login_valido){
            header("Location: home.php");
            exit();
        }
    }
?>

<?php require("componentes/header.php"); ?>

    <main class="caixa">
        <h3>Login</h3>
        <?php if($form): ?>
            <?php if(!$login_valido): ?>
                <h4>Login inválido, tente novamente.</h4>
            <?php endif; ?>
        <?php endif; ?>
        <form action="">
            <input type="text" name="login" placeholder="Nome" autofocus required="required">
            <br><br>
            <input type="password" name="senha" placeholder="Senha" required="required">
            <br><br>
            <input type="submit" value="Entrar">
        </form>

        
    </main>

<?php require("componentes/footer.php");?>