<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    private $carrinho;
    private $produto;

    protected function setUp(): void
    {
        $this->carrinho = new Carrinho();
        $this->produto  = new Produto();

        parent::setUp();
    }

    protected function tearDown(): void
    {
        unset($this->carrinho);
        unset($this->produto);
    }

    protected function assertPreConditions(): void
    {
        $classe = class_exists('\\Code\\Carrinho');

        $this->assertTrue($classe);
    }

    protected function assertPostConditions(): void
    {
        // Executada sempre depois do teste e o método Tears Down
    }


    public function testSeClasseCarrinhoExiste()
    {
        $class = class_exists('\\Code\\Carrinho');

        $this->assertTrue($class);
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto = $this->produto;
        $produto->setName('Bolacha');
        $produto->setPrice('20.00');
        $produto->setSlug('bolacha-1');

        $produto2 = $this->produto;
        $produto2->setName('Bolacha2');
        $produto2->setPrice('244.00');
        $produto2->setSlug('bolacha-3');

        $produto3 = $this->produto;
        $produto3->setName('Bolacha3');
        $produto3->setPrice('244.00');
        $produto3->setSlug('bolacha-3');

        $carrinho = $this->carrinho;
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
        $produto = $this->produto;
        $produto->setName('Bolacha');
        $produto->setPrice('20.00');
        $produto->setSlug('bolacha-1');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto);

        $this->assertEquals('Bolacha', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals('20.00', $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('bolacha-1', $carrinho->getProdutos()[0]->getSlug());

    }

    public function testSeTotalDeProdutosEVAloresDaCompraEstaoCorretos()
    {
        $produtoStub = $this->getStubProduto();

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produtoStub);

        $produto = $this->produto;
        $produto->setName('Bolacha');
        $produto->setPrice('20.00');
        $produto->setSlug('bolacha-1');

        $produto2 = $this->produto;
        $produto2->setName('Bolacha2');
        $produto2->setPrice('244.00');
        $produto2->setSlug('bolacha-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto);
        $carrinho->addProduto($produto2);

        // var_dump($carrinho);

        $this->assertEquals(2, $carrinho->getTotalProdutos());
        $this->assertEquals(507.99, $carrinho->getTotalCompra());
    }

    public function test_se_log_e_salvo_quando_informado_para_adicao_de_produtos()
    {
        $carrinho = $this->carrinho;

        $logMock = $this->getMockBuilder(Log::class)
            ->setMethods(['log'])
            ->getMock();

        $logMock->expects($this->once())
            ->method('log')
            ->with($this->equalTo('Adicionando produtos no carrinho'));

        $carrinho->addProduto($this->getStubProduto(), $logMock);

    }


    private function getStubProduto()
    {
        $produtoStub = $this->createMock(Produto::class);
        $produtoStub->method('getName')->willReturn('Produto1');
        $produtoStub->method('getPrice')->willReturn(19.99);
        $produtoStub->method('getSlug')->willReturn('produto-1');

        return $produtoStub;
    }
}