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

use yii\base\InvalidParamException;
use yii\db\Connection;


/**
 * Class DbProvider
 */
class DbProvider extends CacheProvider
{
    /**
     * Key delimiter
     */
    const DELIMITER = '.';

    /**
     * @var Connection|array|string the DB connection object or component ID of the DB connection.
     */
    public $db = 'db';

    /**
     * @var string Table column that represent setting key.
     */
    public $groupAttribute = 'group';

    /**
     * @var string Table column that represent setting key.
     */
    public $keyAttribute = 'name';

    /**
     * @var string Table column that represent setting value.
     */
    public $valueAttribute = 'value';

    /**
     * @var string
     */
    public $tableName = '{{%settings}}';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->db = \Yii::$app->get($this->db);

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function initialize()
    {
    }

    /**
     * @inheritdoc
     */
    public function getValue($key, $default = null)
    {
        list($group, $key) = $this->extractGroup($key);

        $value = $this->db
            ->createCommand("
                  SELECT
                      `$this->valueAttribute`
                  FROM 
                      $this->tableName
                  WHERE
                      `$this->groupAttribute` = :group
                  AND
                      `$this->keyAttribute` = :key
            ")
            ->bindValue(':group', $group)
            ->bindValue(':key', $key)
            ->queryScalar();

        if (!$value) {
            $value = $default;
        }

        return $value;
    }

    /**
     * Extract group form the key and return both values as array.
     * First value is group and the second is key.
     *
     * @param string $string Full key with group.
     *
     * @return array
     * @throws InvalidParamException
     */
    public function extractGroup($string)
    {
        if (strpos($string, static::DELIMITER) === false) {
            throw new InvalidParamException("Can not extract group in key {$string}");
        }

        return explode(static::DELIMITER, $string, 2);
    }
}
