<?php

    if (!isset($_SESSION)) { 
        session_start();
    };

    $id = $_GET['id'];

    foreach($_SESSION['produtos'] as $chave=>$produto) {
        if ($id == $chave) {
            foreach ($produto as $chave=>$valor) {
                $_GET[$chave] = $produto[$chave];
            }
        }
    }

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
        <a href="index.php" class="btn btn-light btn-produto"> &larr; Voltar para lista de produtos</a></body>
        <form action="editarProduto.php?id=<?php echo $_GET['id']?>" method="POST" enctype="multipart/form-data"> 

        <div class="row mt-4">
            <div class="col-4">
            <img src="<?php echo $_GET['imagem']?>">
            <input type="file" class="form-control-file mt-3" name="imagem" value="<?php echo $_GET['imagem']?>">
            </div>

            <div class="col-8">


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
                    <a href="paginaProduto.php?id=<?php echo $id ?>" class="btn btn-outline-secondary ml-3">Cancelar</a>
                </div>

            </div>
</body>
</html>


