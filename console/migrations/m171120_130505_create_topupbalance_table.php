<?php

use yii\db\Migration;

/**
 * Handles the creation of table `topupbalance`.   пополнение
 */
class m171120_130505_create_topupbalance_table extends Migration
{
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
        $this->createTable('topupbalance', [
            'id' => $this->primaryKey(),
            'u_id'=>$this->integer()->notNull(),
            'total'=>$this->decimal(10,2),
            'created_at'=>$this->dateTime(),
        ],$tableOptions);

        // add foreign key for table `topupbalance`
        $this->addForeignKey(
            'fk-topupbalance-user_id',
            'topupbalance',
            'u_id',
            'user',
            'id',
            'RESTRICT'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('topupbalance');
    }
}
