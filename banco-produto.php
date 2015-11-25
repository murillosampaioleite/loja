<?php
require_once("conecta.php");
require_once("class/Categoria.php");
require_once("class/Produto.php");

function listaProdutos($conexao) {
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
	while($produto_atual = mysqli_fetch_assoc($resultado)) {
		$produto = new Produto;
		$categoria = new Categoria;

		$categoria->nome = $produto_atual['categoria_nome'];
		$categoria->id = $produto_atual['id'];

		$produto->id = $produto_atual['id'];
		$produto->nome = $produto_atual['nome'];
		$produto->preco = $produto_atual['preco'];
        $produto->descricao = $produto_atual['descricao'];
        $produto->categoria = $categoria;
        $produto->usado = $produto_atual['usado'];

		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, Produto $produto) {
	echo $produto->usado;
	$query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$produto->nome}', {$produto->preco},	'{$produto->descricao}', {$produto->categoria->id}, {$produto->usado})";

	return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto ) {
	$query = "update produtos set nome =
		'{$produto->nome}',
		preco = {$produto->preco},
		descricao = '{$produto->descricao}',
		categoria_id= {$produto->categoria_id},
		usado = {$produto->usado}
		where id = '{$produto->id}'";
	return mysqli_query($conexao, $query);
}


function buscaProduto($conexao, $id) {
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeProduto($conexao, $id) {
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}
