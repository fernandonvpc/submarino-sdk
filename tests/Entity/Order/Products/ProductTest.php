<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/submarino-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace Gpupo\Tests\SubmarinoSdk\Entity\Order\Products;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\Tests\SubmarinoSdk\Entity\Order\OrderTestCaseAbstract;

/**
 * @coversNothing
 */
class ProductTest extends OrderTestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\SubmarinoSdk\Entity\Order\Products\Product\Product';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'link' => [],
            'quantity' => 1,
            'price' => 2.1,
            'freight' => 0.2,
            'discount' => 0.1,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    public function testCadaPedidoPossuiUmaColeçãoDeObjetosProduto()
    {
        foreach ($this->getList() as $order) {
            foreach ($order->getProducts() as $product) {
                $this->assertInstanceOf(
                    '\Gpupo\SubmarinoSdk\Entity\Order\Products\Product\Product',
                $product
                );

                $this->assertInstanceOf(
                    '\Gpupo\SubmarinoSdk\Entity\Order\Products\Product\Link',
                $product->getLink()
                );
            }
        }
    }

    /**
     * @testdox Possui método ``getLink()`` para acessar Link
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testGetterLink(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('link', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setLink()`` que define Link
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testSetterLink(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('link', 'object', $object);
    }

    /**
     * @testdox Possui método ``getQuantity()`` para acessar Quantity
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testGetterQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('quantity', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setQuantity()`` que define Quantity
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testSetterQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('quantity', 'integer', $object);
    }

    /**
     * @testdox Possui método ``getPrice()`` para acessar Price
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testGetterPrice(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('price', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setPrice()`` que define Price
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testSetterPrice(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('price', 'number', $object);
    }

    /**
     * @testdox Possui método ``getFreight()`` para acessar Freight
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testGetterFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('freight', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setFreight()`` que define Freight
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testSetterFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('freight', 'number', $object);
    }

    /**
     * @testdox Possui método ``getDiscount()`` para acessar Discount
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testGetterDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('discount', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDiscount()`` que define Discount
     * @dataProvider dataProviderObject
     *
     * @param null|mixed $expected
     */
    public function testSetterDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('discount', 'number', $object);
    }
}
