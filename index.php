<?php 

    if (!isset($_SESSION)) { 
       session_start();
    };

    $_SESSION['categorias'] = ["Boné", "Botton", "Camiseta", "Caneca"];

    function cadastrarProduto($nome, $categoria, $descricao, $quantidade, $preco, $imagem){

        if(!isset($_SESSION['produtos'])){
            $_SESSION['produtos'][] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "imagem"=>$imagem];
     
            //checa se há dados de produtos na session e retorna mensagem de erro ou sucesso
            if(!isset($_SESSION['produtos'])) {
                return "Não foi possível cadastrar o produto. Tente novamente";
            } else {
                return "Produto cadastrado com sucesso!";
            };
    
    
        } else {
            $_SESSION['produtos'][] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "imagem"=>$imagem];        
            } 
        
            if(!isset($_SESSION['produtos'])) {
                return "Não foi possível cadastrar o produto. Tente novamente";
            } else {
                return "Produto cadastrado com sucesso!";
            }
    
    }

    if($_POST) {

        $nomeImg = $_FILES['imagem']['name'];
        $localTmp = $_FILES['imagem']['tmp_name'];
        $caminhoSalvo = 'img/'.$nomeImg;
        $deucerto = move_uploaded_file($localTmp, $caminhoSalvo);

        echo cadastrarProduto($_POST['nome'],$_POST['categoria'], $_POST['descricao'], $_POST['quantidade'],$_POST['preco'], $caminhoSalvo);
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
                <?php if(isset($_SESSION['produtos'])) {
                    foreach($_SESSION['produtos'] as $chave=>$produto) { ?>
                            <tbody>
                                <tr>
                                <td><a href="paginaProduto.php?id=<?php echo $chave ?>"><?php echo $produto['nome']; ?></a></td>
                                <td><?php echo $produto['categoria']; ?></td>
                                <td><?php echo $produto['preco']; ?></td>
                                </tr>
                            </tbody>
                        <?php } 
                        } else { ?>
                            <td colspan="3">Ainda não há produtos cadastrados :(</td>
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
                        <label for="categoria" class="mb-0">Categoria</label><br>
                        <small class="text-muted">Selecione entre as opções ou escreva uma nova categoria</small>
                        <!-- aparentemente só dá para deixar um valor pré-selecionado com datalist usando javascript -->
                        <input list="categorias" class="form-control" name="categoria">
                        <datalist id="categorias" name="categorias" required>
                            <?php foreach($_SESSION['categorias'] as $categoria) {?>
                            <option value="<?php echo $categoria?>"></option>
                            <?php } ?>
                        </datalist>

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
                    <input type="file" class="form-control-file" name="imagem" required accept="image/*">
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