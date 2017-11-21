<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $pass=Yii::$app->security->generatePasswordHash('11111111');
        $this->batchInsert('user', ['username', 'auth_key','password_hash','email','created_at','updated_at'], [
            ['admin', Yii::$app->security->generateRandomString(),$pass ,  'biryukwolf@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user1', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf1@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user2', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf2@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user3', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf3@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user4', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf4@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user5', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf5@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user6', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf6@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user7', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf7@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user8', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf8@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user9', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf9@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
            ['user10', Yii::$app->security->generateRandomString(), $pass,  'biryukwolf10@yahoo.com'  ,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')],
//            [2, 'title2', '2015-04-11'],
//            [3, 'title3', '2015-04-12'],
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
