<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos da loja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
<body>
    <div class="container mt-5">
        <div class="row">
            <section class="col-7">
                <h2>Todos os produtos</h2>
            </section>
            <section class="col-5 bg-light p-5">
                <form> 
                    <h3>Cadastrar produto</h3>
                    <br>
                    <div class="form-group font-weight-bold">
                        <label for="nomeProduto">Nome</label>
                        <input type="text" class="form-control" id="nomeProduto" required>
                        <div class="invalid-feedback">Insira o nome do produto</div>
                    </div>

                    <div class="form-group font-weight-bold">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" id="categoria" required>
                            <option value="">Selecione a categoria do produto</option>
                            <option>Camiseta</option>
                            <option>Caneca</option>
                            <option>Boné</option>
                            <option>Botton</option>
                        </select>
                    </div>

                    <div class="form-group font-weight-bold">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="3" required></textarea>
                    </div>

                    <div class="form-group font-weight-bold">
                    <label for="quantidade">Quantidade em estoque</label>
                    <input type="number" class="form-control" id="quantidade">
                    </div>

                    <div class="form-group font-weight-bold">
                    <label for="foto">Foto do produto</label>
                    <input type="file" class="form-control-file" id="foto">
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