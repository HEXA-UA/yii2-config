<?php
/**
 * SettingsTest
 * @version     0.1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 */

namespace Tapakan\Settings\Tests\unit;

use Codeception\Specify;
use Tapakan\Settings\SettingsActiveRecord;
use Tapakan\Settings\Tests\unit\data\Setting;
use Yii;

/**
 * Class SettingsTest
 */
class SettingsTest extends TestCase
{
    use Specify;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->loadTestDbData();
    }

    /**
     * Test get existing value
     */
    public function testGetExisting()
    {
        $this->specify("Get existing value", function () {
            $settings = $this->createSettings();

            $min          = $settings->get('min_withdrawal', 'existing');
            $float        = $settings->get('min_float', 'existing');
            $strangeUpper = $settings->get('STRANGE_insensitively', 'strange');
            $strangeLower = $settings->get('strange_INSENSITIVELy', 'strange');
            $spell        = $settings->get('SPELL-SPELL_+~@#$', '!)_@#');

            verify($min)->equals(100);
            verify($float)->equals(0.1);
            verify($strangeUpper)->equals('yes');
            verify($strangeLower)->equals('yes');
            verify($spell)->equals('#!');
        });
    }

    /**
     * Check the keys to existence
     */
    public function testCheckExists()
    {
        $this->specify("Check the keys to existence", function () {
            $settings = $this->createSettings();

            verify($settings->exists('min_withdrawal'))->true();
            verify($settings->exists('strange_INSENSITIVELy'))->true();
            verify($settings->exists('non_existing'))->false();
            verify($settings->exists('new_setting'))->false();
        });
    }

    /**
     * Test set values
     */
    public function testSetValue()
    {
        $this->specify("Set value", function () {
            $settings = $this->createSettings();

            $randomStr = $this->faker->shuffleString();
            $settings->set('min_withdrawal', 175);
            $settings->set('see_in', 'yeap!');
            $settings->set('new_setting', $randomStr);

            $this->tester->canSeeRecord(Setting::className(), [
                'key'   => 'min_withdrawal',
                'value' => 175
            ]);
            $this->tester->canSeeRecord(Setting::className(), [
                'key'   => 'see_in',
                'value' => 'yeap!'
            ]);
            $this->tester->canSeeRecord(Setting::className(), [
                'key'   => 'new_setting',
                'value' => $randomStr,
            ]);
        });
    }

    /**
     * Test get non existing value
     */
    public function testDefaultValue()
    {
        $settings = $this->createSettings();

        verify($settings->get('max_withdrawal', 10000))->equals(10000);
    }

    /**
     * @return SettingsActiveRecord|object
     */
    public function createSettings()
    {
        return Yii::createObject([
            'class'         => SettingsActiveRecord::className(),
            'settingsClass' => Setting::className(),
        ]);
    }

    /**
     * Load data for test ActiveRecord
     */
    protected function loadTestDbData()
    {
        $db    = Yii::$app->getDb();
        $table = Setting::tableName();

        $db->createCommand()->batchInsert($table, ['key', 'value', 'description'], [
            ['min_withdrawal', 100, ''],
            ['min_float', 0.1, ''],
            ['strange_insensitively', 'yes', ''],
            ['SPELL-SPELL_+~@#$', '#!', ''],
        ])->execute();
    }
}
