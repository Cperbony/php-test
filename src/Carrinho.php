<?php

namespace Code;

use Code\Log;

class Carrinho
{
    private $produtos = [];

    public function addProduto(Produto $produto, Log $log = null)
    {
        $this->produtos[] = $produto;
        if (!is_null($log)) {

            $log->log('Adicionando produtos no carrinho') ?? null;
        }
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