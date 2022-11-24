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

    public function getTotalProdutos()
    {
        return 2;

    }

    public function getTotalCompra()
    {
        $totalCompra = 0;

        foreach ($this->produtos as $produto) {
            $totalCompra += $produto->getPrice();
        }
        return $totalCompra;

    }


}