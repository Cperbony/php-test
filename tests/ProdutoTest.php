<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $produto;
    
    protected function setUp(): void
    {
        $this->produto = new Produto();
        
        parent::setUp();
    }
    
    protected function tearDown(): void
    {
        unset($this->produto);
    }
    
    public static function setUpBeforeClass(): void
    {
        print __METHOD__;
    }
    
    public static function tearDownAfterClass(): void
    {
        print __METHOD__;
    }
    
    
    public function testSeNomeProdutoSetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setName('Produto 1');

        self::assertEquals('Produto 1', $produto->getName(), 'Valores iguais!');
    }

    public function testSePrecoProdutoSetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setPrice('19.10');

        self::assertEquals('19.10', $produto->getPrice());
    }

    public function testSeSlugProdutoSetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setSlug('produto-1');

        self::assertEquals('produto-1', $produto->getSlug());
    }

}