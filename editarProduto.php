<?php

    include('variaveis.php');
    //para lembrar o que tem no arquivo de variáveis:
    // $listaProdutos = "produtos.json";
    // $produtos = json_decode(file_get_contents($listaProdutos), true);

    if (!isset($_SESSION)) { 
        session_start();
    };
    //dúvida: preciso encerrar a sessão?

    $id = $_GET['id'];

    foreach($produtos as $produto) {
        if ($id == $produto['id']) {
            $_GET['nome'] = $produto['nome'];
            $_GET['categoria'] = $produto['categoria'];
            $_GET['descricao'] = $produto['descricao'];
            $_GET['quantidade'] = $produto['quantidade'];
            $_GET['preco'] = $produto['preco'];
            $_GET['imagem'] = $produto['imagem'];
        }
    };

    // var_dump($_POST);


    // function atualizarProduto ($nome, $categoria, $descricao, $quantidade, $preco) {
    //     $listaProdutos = "produtos.json";
    //     $produtos = json_decode(file_get_contents($listaProdutos), true);

    //     foreach ($produtos as $produto) {
    //     $produtos[$produto['id']] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco];
    //     }
    //     $json = json_encode($produtos);
    // }

    // if($_POST) {
    //     // $nomeImg = $_FILES['imagem']['name'];
    //     // $localTmp = $_FILES['imagem']['tmp_name'];
    //     // $caminhoSalvo = 'img/'.$nomeImg;
    //     // $deucerto = move_uploaded_file($localTmp, $caminhoSalvo);
    
    //     echo atualizarProduto($_POST['nome'],$_POST['categoria'], $_POST['descricao'], $_POST['quantidade'],$_POST['preco']);//, $caminhoSalvo);
    
    // }

 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos da loja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5 bg-light p-5">
        <a href="cadastrarProduto.php" class="btn btn-light btn-produto"> &larr; Voltar para lista de produtos</a></body>
        <div class="row mt-4">
        
            <div class="col-4">
            <img src="<?php echo $_GET['imagem']?>">
            <input type="file" class="form-control-file" name="imagem">
            </div>

            <div class="col-8">
            <form action="editarProduto.php?id=<?php echo $_GET['id']?>" method="POST" enctype="multipart/form-data"> 

                <p>Nome do produto</p>
                <input type="text" name="nome" value=<?php echo $_GET['nome'] ?> class="form-control">

                <p>Categoria</p>
                <p class="info-produto">
                <select class="form-control" name="categoria">
                    <?php 
                    $categorias = ['Camiseta', 'Caneca', 'Boné', 'Botton'];
                    foreach ($categorias as $categoria) {
                        if($_GET['categoria'] == $categoria) { ?>
                            <option selected value="<?php $categoria ?>"><?php echo $categoria?></option>
                        <?php
                        } else { ?>
                            <option value="<?php $categoria ?>"><?php echo $categoria ?></option>
                        <?php
                        }
                    }
                        ?>
                </select>

                <p>Descrição</p>
                <p class="info-produto">
                <textarea class="form-control" name="descricao" rows="3" required value="<?php $_GET['descricao'] ?>"><?php echo $_GET['descricao'] ?></textarea>
                </p>

                <div class="row mt-5">
                    <div class="col-6">
                            <p>Quantidade em estoque</p>
                            <p class="info-produto">
                            <input type="number" class="form-control" name="quantidade" value="<?php echo $_GET['quantidade'] ?>">
                            </p>
                    </div>
                    <div class="col-6">
                        <p>Preço</p>
                        <p class="info-produto">
                        <input type="number" class="form-control" name="preco" step="0.01" value="<?php echo $_GET['preco'] ?>">              
                        </p>
                    </div>
               </div>

                <div class="row mt-5">
                    <button type="submit" class="btn btn-outline-info ml-3">Salvar</button></a>
                    <a href="paginaProduto.php?id=<?php echo $produto['id'] ?>" class="btn btn-outline-secondary ml-3">Cancelar</a>
                </div>

            </div>
</body>
</html>


