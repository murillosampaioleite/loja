<?php
    class Produto {
        public $id;
        public $nome;
        public $preco;
        public $descricao;
        public $categoria;
        public $usado;

        public function valorComDesconto($valor = 0.1){
            $this->preco -= $this->preco * $valor;
            return $this->preco;
        }

        public function setPreco($preco) {
            if( $preco > 0 ){
                $this->preco = $preco;
            }
        }

        public function getPreco() {
            return $this->preco;
        }

        function __contruct( $nome, $preco, $descricao, Categoria $categoria, $usado ) {

        }

    }
?>
