<?php
/**
 * BaseConfig
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\component;

use hexaua\yiiconfig\component\providers\ProviderInterface;
use yii\base\Component;

/**
 * BaseConfig implements a ConfigInterface.
 * The following is an example of using 'some config' to provide interface for settings:
 *
 * ```php
 * [
 *     'components' => [
 *          'config' => [
 *               'class'          => 'hexaua\yiiconfig\component\ManagerConfig',
 *               'providerConfig' => 'hexaua\yiiconfig\component\providers\DbProvider'
 *
 *               // OR you can configure it
 *
 *               'providerConfig' => [
 *                    'class'      => 'hexaua\yiiconfig\component\providers\DbProvider',
 *                    'tableName'  => '{{%settings}}'
 *                ],
 *
 *              // Pass some arguments to constructor
 *
 *              'providerConfig' => 'hexaua\yiiconfig\component\providers\ArrayProvider',
 *              'providerParams' => [
 *                  'data' => [
 *                      'siteName' => 'Test it'
 *                  ]
 *              ]
 *          ]
 *     ]
 * ]
 *
 * @author Alexander Oganov <t_tapak@yahoo.com>
 */
abstract class BaseConfig extends Component implements ConfigInterface
{
    const EVENT_BEFORE_LOAD = 'beforeLoad';
    const EVENT_AFTER_LOAD  = 'afterLoad';

    /**
     * @var string
     */
    public $providerConfig = 'hexaua\yiiconfig\component\providers\ArrayProvider';

    /**
     * Params that will be passed to constructor.
     * @var array
     */
    public $providerParams = [];

    /**
     * @var ProviderInterface Instance of provider.
     */
    protected $provider;

    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        return $this->getProvider()->get($key, $default);
    }

    /**
     * @return ProviderInterface
     */
    public function getProvider()
    {
        if (!$this->provider) {
            $this->provider = \Yii::createObject($this->providerConfig, $this->providerParams);
        }

        return $this->provider;
    }
}
