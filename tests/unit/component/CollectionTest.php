<?php
/**
 * TestUnit
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\aggregator;

use hexa\yiiconfig\component\Collection;
use hexa\yiiconfig\tests\unit\TestUnit;
use yii\base\Object;

/**
 * Class CollectionTest
 */
class CollectionTest extends TestUnit
{
    /**
     * Test basic behavior.
     */
    public function testAdd()
    {
        $this->specify("Collection can add children correctly", function () {
            $model  = new \stdClass();
            $object = new Object();

            $collection = $this->getCollection()
                ->add($model, 'a')
                ->add($object, 'b');

            codecept_debug($collection);

            verify($collection->get('a'))->equals($model);
            verify($collection->get('b'))->equals($object);
            verify($collection->count())->equals(2);
        });

        $this->specify("Collection should return the correct number of children", function () {
            $someValue  = '';
            $otherValue = [];
            $nullValue  = null;

            $collection = $this->getCollection()
                ->add($someValue, 1)
                ->add($otherValue, 'a')
                ->add($nullValue, 'b');

            codecept_debug($collection->toArray());

            verify($collection->count())->equals(3);
        });
    }

    public function testGet()
    {
        $this->specify("Collection can get value by key correctly", function () {
            $collection = $this->getCollection()
                ->add('value', 'key')
                ->add('newValue', 1);

            verify($collection->get(1))->equals('newValue');
        });

        $this->specify("Collection should return default value when key not found", function () {
            $collection = $this->getCollection()
                ->add('value', 'key')
                ->add(null, 'nullKey');

            verify($collection->get('newValue'))->equals(null);
            verify($collection->get('newValue', 'hi'))->equals('hi');
            verify($collection->get('nullKey', 'null!'))->notEquals('null!');
        });

        $this->specify("Collection should adhere to the strict mode with scalar values", function () {
        });
    }

    /**
     * Remove behavior.
     */
    public function testRemove()
    {
        $this->specify("Collection can remove value and return it", function () {

            $baseValue  = mt_rand();
            $collection = $this->getCollection()->add($baseValue, 'val1');

            verify($collection->has('val1'))->true();

            $value = $collection->remove('val1');

            verify($value)->equals($baseValue);
            verify($collection->has('val1'))->false();
        });

        $this->specify("Collection should return default value when key not found", function () {
            $collection        = $this->getCollection();
            $baseValue         = new \stdClass();
            $baseValue->remove = 'removeDefaultValue';

            $valueScalar = $collection->remove('remove', $baseValue->remove);
            $valueObject = $collection->remove('remove', $baseValue);

            verify($valueScalar)->equals('removeDefaultValue');
            verify($valueObject)->equals($valueObject);
        });
    }

    /**
     * @return Collection
     */
    protected function getCollection()
    {
        return new Collection();
    }
}
