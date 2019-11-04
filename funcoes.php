<?php

function cadastrarProduto($nome, $categoria, $descricao, $quantidade, $preco, $imagem){

    if(!isset($_SESSION['produtos'])){
        $_SESSION['produtos'][] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "imagem"=>$imagem];
 
        //checa se há dados de produtos na session e retorna mensagem de erro ou sucesso
        if(!isset($_SESSION['produtos'])) {
            return "Não foi possível cadastrar o produto. Tente novamente";
        } else {
            return "Produto cadastrado com sucesso!";
        };

        //para acrescentar uma nova categoria nas opções (não está funcionando)
        // foreach ($_SESSION['categorias'] as $categoriaProduto) {

        //     foreach($_SESSION['produtos'] as $chave=>$produto) {
        //         if($produto['categoria'] != $categoriaProduto) {
        //             $_SESSION['categorias'][] = $produto['categoria'];
        //         }
        //     }
        // }


    } else {
        $_SESSION['produtos'][] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "imagem"=>$imagem];        
        } 
    
        if(!isset($_SESSION['produtos'])) {
            return "Não foi possível cadastrar o produto. Tente novamente";
        } else {
            return "Produto cadastrado com sucesso!";
        }



}

function excluirProduto($id,$produtos) {
    foreach ($produtos as $chaveArray => $produto) {
        if($id == $chaveArray) {
            unset($productos[$chaveArray]);
        }
    }

}


?>