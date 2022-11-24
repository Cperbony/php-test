<?php

namespace Code;

class Carrinho
{
    private $produtos = [];

    public function addProduto(Produto $produto)
    {
        $this->produtos[] = $produto;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

}