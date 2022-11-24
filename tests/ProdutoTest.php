<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testSeNomeProdutoSetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setName('Produto 1');

        self::assertEquals('Produto 1', $produto->getName(), 'Valores iguais!');
    }

    public function testSePrecoProdutoSetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setPrice('19.10');

        self::assertEquals('19.10', $produto->getPrice());
    }

    public function testSeSlugProdutoSetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setSlug('produto-1');

        self::assertEquals('produto-1', $produto->getSlug());
    }

}