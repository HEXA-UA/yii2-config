<?php
/**
 * DbProvider
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component\providers;

use hexa\yiiconfig\component\Collection;
use yii\db\Connection;
use yii\db\QueryInterface;
use yii\db\QueryTrait;
use yii\di\Instance;


/**
 * Class DbProvider
 */
class DbProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @var Connection|array|string the DB connection object or component ID of the DB connection.
     */
    public $db = 'db';

    /**
     * @var string Table column that represent setting key.
     */
    public $keyAttribute = 'key';

    /**
     * @var string Table column that represent setting value.
     */
    public $valueAttribute = 'value';

    /**
     * @var string
     */
    public $tableName = '{{%settings}}';

    /**
     * @var string Class name that implements QueryInterface and QueryTrait
     * @see QueryInterface
     * @see QueryTrait
     */
    public $queryClass = 'yii\db\Query';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->db = Instance::ensure($this->db);

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function initialize()
    {
        $data = $this->getQuery()
            ->select(['key' => $this->valueAttribute, 'value' => $this->keyAttribute])
            ->from($this->tableName)
            ->indexBy($this->keyAttribute)
            ->column();

        return new Collection($data);
    }

    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        $value = $this->getQuery()
            ->select($key)
            ->from($this->tableName)
            ->indexBy($this->keyAttribute)
            ->scalar();

        if ($value) {
            $default = $value;
        }

        return $default;
    }

    /**
     * Return instance of yii\db\Query.
     * @return QueryTrait|QueryInterface
     * @see \yii\db\Query
     */
    protected function getQuery()
    {
        return new $this->queryClass();
    }
}
