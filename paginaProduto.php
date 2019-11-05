<?php

    if (!isset($_SESSION)) { 
        session_start();
    };

    $id = $_GET['id'];
    //guarda na variável produto as informações armazenadas na session relativo àquele produto específico 
    $produto = $_SESSION["produtos"][$id];

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
        <div class="row mt-4">
        
            <div class="col-4">
            <img src="<?php echo $produto['imagem']?>">
            </div>

            <div class="col-8">
 
                    <h1 class="mb-4"><?php echo $produto['nome'] ?></h1>
                    <p>Categoria</p>
                    <p class="info-produto"><?php echo $produto['categoria'] ?></p>

                    <p>Descrição</p>
                    <p class="info-produto"><?php echo $produto['descricao'] ?></p>


               <div class="row mt-5">
                    <div class="col-6">
                            <p>Quantidade em estoque</p>
                            <p class="info-produto"><?php echo $produto['quantidade'] ?></p>

                    </div>
                    <div class="col-6">
                        <p>Preço</p>
                        <p class="info-produto"><?php echo $produto['preco'] ?></p>
                    </div>
               </div>

               <div class="row mt-5">
                    <a href="paginaProdutoEdicao.php?id=<?php echo $id ?>"><button class="btn btn-outline-secondary ml-3">Editar informações do produto</button></a>
                    <!-- seria interessante ter uma mensagem de alerta antes de excluir! -->

                    <form action="excluirProduto.php?id=<?php echo $id?>" method="POST"> 
                        <button type="submit" class="btn btn-outline-danger ml-3">Excluir produto da loja</button>
                    </form>

                </div>

            </div>
</html>


