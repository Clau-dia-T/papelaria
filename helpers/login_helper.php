<?php

function getDataAtual(){
    date_default_timezone_set("Europe/Lisbon");
    $data_atual = date("h:i:s - d/m/Y");
    return $data_atual;
}

function setDataUltimoAcesso($id){
    $ultimo_acesso = getDataAtual();
    iduSQL("UPDATE colaboradores SET ultimo_acesso='$ultimo_acesso' WHERE id='$id'");
}

function fazerLogin($login, $senha){
    $colaborador = selectSQLUnico("SELECT * FROM colaboradores WHERE login='$login' AND senha='$senha'");
    
    if(!empty($colaborador)){
        session_start();
        $_SESSION["colaborador"] = $colaborador;
        unset($_SESSION["colaborador"]["senha"]);
        setDataUltimoAcesso($colaborador["id"]);
        return true;
    }

    return false;
}

function verificarLogado(){
    session_start();
    if(!empty($_SESSION["colaborador"])){
        return true;
    }
    else{
        return false;
    }
}

function verificarLogadoRedirecionar(){
    session_start();
    if(!empty($_SESSION["colaborador"])){
        return true;
    }
    else{
        header("Location: index.php");
        exit();
    }
}

function logOut(){
    session_start();
    session_destroy();
}

?>