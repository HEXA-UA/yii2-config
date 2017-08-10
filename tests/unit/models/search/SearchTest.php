<?php
/**
 * SearchTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\models\search;

use AspectMock\Test;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Class SearchTest
 */
abstract class SearchTest extends TestUnit
{
    /**
     * @inheritdoc
     */
    protected function _before()
    {
        parent::_before();

        $this->registerServices();
    }

    /**
     * Test instantiate dataProvider function
     */
    public function testGetDataProvider()
    {
        $modelClass = $this->getModelClass();

        test::double($modelClass, ['find' => new \ArrayObject()]);
        $key = \Yii::createObject([
            'class'             => $modelClass,
            'dataProviderClass' => \ArrayObject::class
        ]);

        $dataProvider = $key->getDataProvider([
            'name' => 'anonymous'
        ]);

        verify($dataProvider)->isInstanceOf(\ArrayObject::class);
        verify($dataProvider->count())->equals(4); // 4 because 3 of params is default
        verify((array)$dataProvider)->contains('anonymous');
    }

    /**
     * @return string
     */
    abstract public function getModelClass();
}
