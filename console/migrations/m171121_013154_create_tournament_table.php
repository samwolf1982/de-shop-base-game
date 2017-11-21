<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tournament`.
 */
class m171121_013154_create_tournament_table extends Migration
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
        $this->createTable('tournament', [
            'id' => $this->primaryKey(),
            'id_product' => $this->integer()->notNull(),
            'date_start'=>$this->dateTime()->null(),// дата начала турнира
            'date_end'=>$this->dateTime()->null(), // дата конца турнира
            'admission'=>$this->decimal(10,2)->notNull(),// плата за вход в snappuncte !!! 1 to 100,
            'min_price'=>$this->decimal(10,2)->defaultValue(1),//минимальная цена продукта 1 евро,
            'step_price'=>$this->decimal(10,2)->defaultValue(0.7),//на какую сумуу уменьшается стоимость товара для победителя
            'user_limit'=>$this->integer()->notNull()->defaultValue(1000000),//максимальное количество пользователей,
        ],$tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tournament');
    }
}
