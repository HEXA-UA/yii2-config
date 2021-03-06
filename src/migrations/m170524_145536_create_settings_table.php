<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m170524_145536_create_settings_table extends Migration
{
    /**
     * @var string
     */
    private static $_tableName = '{{%settings}}';

    /**
     * @var string
     */
    private static $_refKeyTableName = '{{%settings_keys}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::$_tableName, [
            'id'    => $this->primaryKey(),
            'group' => $this->string(255)->notNull(),
            'name'  => $this->string(255)->notNull(),
            'value' => $this->text()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'INX-GROUP-NAME-UNQ',
            self::$_tableName,
            ['group', 'name'],
            true
        );

        $this->addForeignKey(
            'FK-SETTING_NAME-KEY_NAME',
            self::$_tableName,
            'name',
            self::$_refKeyTableName,
            'name',
            'RESTRICT',
            'RESTRICT'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('FK-NAME-NAME-GROUP-GROUP', self::$_tableName);
        $this->dropTable(self::$_tableName);
    }
}
