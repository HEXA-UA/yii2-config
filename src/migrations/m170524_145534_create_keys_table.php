<?php


use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `keys_table`.
 */
class m170524_145534_create_keys_table extends Migration
{
    /**
     * @var string
     */
    private static $_tableName = '{{%keys}}';

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
            'group'       => Schema::TYPE_STRING . ' NOT NULL',
            'name'        => Schema::TYPE_STRING . ' NOT NULL',
            'type'        => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_STRING . '(1000) NOT NULL',
            'PRIMARY KEY(name)'
        ], $tableOptions);

        $this->createIndex(
            'INX-GROUP-NAME-UNQ',
            self::$_tableName,
            ['group', 'name'],
            true
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::$_tableName);
    }
}
