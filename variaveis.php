<?php
    $listaProdutos = "produtos.json";
    $produtos = json_decode(file_get_contents($listaProdutos), true);
?>