<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m170524_145534_create_settings_table extends Migration
{
    /**
     * @var string
     */
    private static $_tableName = '{{%settings}}';

    /**
     * @var string
     */
    private static $_refTableName = '{{%keys}}';

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
            'name'  => $this->string(255)->notNull()->unique(),
            'value' => $this->string(255)->notNull(),
            'group' => $this->string(255)->notNull()
        ], $tableOptions);

        $this->createIndex(
            'NAME_KEYS_UNIQUE',
            self::$_tableName,
            ['name'],
            true
        );

        $this->addForeignKey(
            'SETTINGS_NAME_KEYS_NAME',
            self::$_tableName,
            'name',
            self::$_refTableName,
            'name'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('SETTINGS_KEY_KEYS_NAME', self::$_tableName);
        $this->dropTable(self::$_tableName);
    }
}
