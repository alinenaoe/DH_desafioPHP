<?php

    if (!isset($_SESSION)) { 
        session_start();
    };

    $id = $_GET['id'];
    $produto = $_POST;


    //se for enviada alguma informação nova pelo formulário que não seja a imagem:
    if ($_POST) {
    
        foreach($_SESSION['produtos'][$id] as $chave=>$valor) {
            if($chave != "imagem") {
                if($valor != $produto[$chave]) {
                    $_SESSION['produtos'][$id][$chave] = $produto[$chave];
                }       
            }
        }

        

    header('Location:paginaProduto.php?id='.$id);

    }

 

?>

