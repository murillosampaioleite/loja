<?php
    require "class/Produto.php";

    $livro = new Produto;

    $livro->nome = "Lord of the rings";
    echo "<pre>";
    var_dump($livro);
    echo "</pre>";
?>
