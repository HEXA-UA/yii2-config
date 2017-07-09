<?php
/**
 * BaseConfig
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component;

use hexa\yiiconfig\component\providers\ProviderInterface;
use yii\base\Component;

/**
 * BaseConfig implements a ConfigInterface.
 * The following is an example of using 'some config' to provide interface for settings:
 *
 * ```php
 * [
 *     'components' => [
 *          'config' => [
 *               'provider' => hexa\yiiconfig\providers\DbProvider
 *
 *               // OR you can configure it
 *
 *               'provider' => [
 *                    'class'      => 'hexa\yiiconfig\providers\DbProvider',
 *                    'queryClass' => 'yii\db\Query',
 *                    'tableName'  => '{{%settings}}'
 *                ],
 *          ]
 *     ]
 * ]
 *
 * @author Alexander Oganov <t_tapak@yahoo.com>
 * @since  1.0.0
 */
abstract class BaseConfig extends Component implements ConfigInterface
{
    const EVENT_BEFORE_LOAD = 'beforeLoad';
    const EVENT_AFTER_LOAD  = 'afterLoad';

    /**
     * @var string
     */
    public $providerConfig = 'hexa\yiiconfig\component\providers\ArrayProvider';

    /**
     * @var ProviderInterface Instance of provider.
     */
    protected $provider;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->getProvider()->load();
    }

    /**
     * @inheritdoc
     */
    public function getProvider()
    {
        return \Yii::createObject($this->providerConfig);
    }
}
