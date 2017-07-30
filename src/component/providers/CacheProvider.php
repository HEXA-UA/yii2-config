<?php
/**
 * CacheProvider
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component\providers;

use yii\caching\Cache;

/**
 * Class CacheProvider
 */
abstract class CacheProvider extends BaseProvider
{
    /**
     * Cache will expire in one day.
     * @var int
     */
    public $duration = 86400;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->cache = \Yii::$app->get('cache');
    }

    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        $value = $this->cache->get($key);

        if (!$value) {
            $value = parent::get($key, $default);

            $this->cache->add($key, $value);
        }

        return $value;
    }
}
