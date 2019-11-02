<?php 
include_once('variaveis.php');

function cadastraProduto($nome, $categoria, $descricao, $quantidade, $preco, $imagem){
    $listaProdutos = "produtos.json";
    if(file_exists($listaProdutos)){

        $arquivo = file_get_contents($listaProdutos);
        $produtos = json_decode($arquivo, true);
        
        $produtos[] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "imagem"=>$imagem];
        $json = json_encode($produtos);

        $deuCerto = file_put_contents($listaProdutos, $json);
        if($deuCerto){
            return "Produto cadastrado com sucesso!";
        } else {
            return "Seu produto não foi cadastrado";
        } 

    } else {
        $produtos = [];
 
        $produtos[] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "imagem"=>$imagem];
        $json = json_encode($produtos);

        $deuCerto = file_put_contents($listaProdutos, $json);
        if($deuCerto){
            return "Produto cadastrado com sucesso!";
        } else {
            return "Seu produto não foi cadastrado";
        } 
    }

}

if($_POST) {
    $nomeImg = $_FILES['imagem']['name'];
    $localTmp = $_FILES['imagem']['tmp_name'];
    $caminhoSalvo = 'img/'.$nomeImg;
    $deucerto = move_uploaded_file($localTmp, $caminhoSalvo);

    echo cadastraProduto($_POST['nome'],$_POST['categoria'], $_POST['descricao'], $_POST['quantidade'],$_POST['preco'], $caminhoSalvo);

    // foreach($produtos as $produto) {
    //     file_put_contents($nomeProduto,('paginaProduto.php'));
    // }
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
    <div class="container mt-5">
        <div class="row">
            <section class="col-7">
                <h2>Todos os produtos</h2>
                <table class="table mt-5">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Preço</th>
                    </tr>
                </thead>
                <?php foreach($produtos as $produto) { ?>
                        <tbody>
                            <tr>
                            <td><?php echo $produto['nome']; ?></td>
                            <td><?php echo $produto['categoria']; ?></td>
                            <td><?php echo $produto['preco']; ?></td>
                            </tr>
                        </tbody>
                <?php } ?>
                </table>
            </section>
 
            <section class="col-5 bg-light p-5 mb-5">
                <form action="" method="POST" enctype="multipart/form-data"> 
                    <h3>Cadastrar produto</h3>
                    <br>
                    <div class="form-group font-weight-bold">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" required>
                        <div class="invalid-feedback">Insira o nome do produto</div>
                    </div>

                    <div class="form-group font-weight-bold">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" name="categoria" required>
                            <option value="">Selecione a categoria do produto</option>
                            <option>Camiseta</option>
                            <option>Caneca</option>
                            <option>Boné</option>
                            <option>Botton</option>
                        </select>
                    </div>

                    <div class="form-group font-weight-bold">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" rows="3" required></textarea>
                    </div>

                    <div class="form-group font-weight-bold">
                    <label for="quantidade">Quantidade em estoque</label>
                    <input type="number" class="form-control" name="quantidade">
                    </div>

                    <div class="form-group font-weight-bold">
                    <label for="preco">Preço</label>
                    <input type="number" class="form-control" name="preco" step="0.01" placeholder="0.00">
                    </div>

                    <div class="form-group font-weight-bold">
                    <label for="imagem">Foto do produto</label>
                    <input type="file" class="form-control-file" name="imagem">
                    </div>
                   
                    <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </form>
            </section>

        </div>
    </div>

</body>
</html>