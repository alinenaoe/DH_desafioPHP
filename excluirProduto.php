<?php

    session_start();

    $id = $_GET['id'];
    //var_dump($id);

        foreach ($produtos as $produto) {
            if($produto['id']==$id) {
                unset($produto);
                $json = json_encode($produtos);
                file_put_contents($listaProdutos, $json);
                return "deu certo";
            }
        }
 

?>