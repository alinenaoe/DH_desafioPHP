<?php

    include('variaveis.php');

    if (!isset($_SESSION)) { 
        session_start();
        };

    foreach($produtos as $produto) {
        $_SESSION['id'] = $produto['id'];
        $_SESSION['nome'] = $produto['nome'];
        $_SESSION['categoria'] = $produto['categoria'];
        $_SESSION['descricao'] = $produto['descricao'];
        $_SESSION['quantidade'] = $produto['quantidade'];
        $_SESSION['preco'] = $produto['preco'];
        $_SESSION['imagem'] = $produto['imagem'];

    };

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
            <img src="<?php echo $_SESSION['imagem']?>">
            </div>

            <div class="col-8">
 
                    <h1 class="mb-4"><?php echo $_SESSION['nome'] ?></h1>
                    <p>Categoria</p>
                    <p class="info-produto"><?php echo $_SESSION['categoria'] ?></p>

                    <p>Descrição</p>
                    <p class="info-produto"><?php echo $_SESSION['descricao'] ?></p>


               <div class="row mt-5">
                    <div class="col-6">
                            <p>Quantidade em estoque</p>
                            <p class="info-produto"><?php echo $_SESSION['quantidade'] ?></p>

                    </div>
                    <div class="col-6">
                        <p>Preço</p>
                        <p class="info-produto"><?php echo $_SESSION['preco'] ?></p>

                    </div>
               </div>

            </div>
</html>


