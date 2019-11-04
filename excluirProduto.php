<?php

    session_start();

    $id = $_GET['id'];
    //var_dump($id);

        foreach ($_SESSION['produtos'] as $chave=>$produto) {
            if($chave==$id) {
                unset($_SESSION['produtos'][$chave]);
                header('Location:index.php');
            }
        }
 

?>