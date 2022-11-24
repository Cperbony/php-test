<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    public function testSeClasseCarrinhoExiste()
    {
        $class = class_exists('\\Code\\Carrinho');

        $this->assertTrue($class);
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto = new Produto();
        $produto->setName('Bolacha');
        $produto->setPrice('20.00');
        $produto->setSlug('bolacha-1');

        $produto2 = new Produto();
        $produto2->setName('Bolacha2');
        $produto2->setPrice('244.00');
        $produto2->setSlug('bolacha-3');

        $produto3 = new Produto();
        $produto3->setName('Bolacha2');
        $produto3->setPrice('244.00');
        $produto3->setSlug('bolacha-3');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto);
        $carrinho->addProduto($produto2);
        $carrinho->addProduto($produto3);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[0]);
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[1]);
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[2]);
    }

    public function testSeValoresDeProdutosNoCarrinhoEstaoCorretos()
    {
        $produto = new Produto();
        $produto->setName('Bolacha');
        $produto->setPrice('20.00');
        $produto->setSlug('bolacha-1');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto);

        $this->assertEquals('Bolacha', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals('20.00', $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('bolacha-1', $carrinho->getProdutos()[0]->getSlug());

    }

    public function testSeTotalDeProdutosEVAloresDaCompraEstaoCorretos()
    {
        $produto = new Produto();
        $produto->setName('Bolacha');
        $produto->setPrice('20.00');
        $produto->setSlug('bolacha-1');

        $produto2 = new Produto();
        $produto2->setName('Bolacha2');
        $produto2->setPrice('244.00');
        $produto2->setSlug('bolacha-3');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto);
        $carrinho->addProduto($produto2);

        $this->assertEquals(2, $carrinho->getTotalProdutos());
        $this->assertEquals(264.00, $carrinho->getTotalCompra());
    }
}