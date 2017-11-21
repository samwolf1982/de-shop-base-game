<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "topupbalance".
 *
 * @property integer $id
 * @property integer $u_id
 * @property string $total
 * @property string $created_at
 */
class Topupbalance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topupbalance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id','total'], 'required'],
            [['u_id'], 'integer'],
            [['total'], 'number', 'min' => '0.01'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'u_id' => 'U ID',
            'total' => 'Total',
            'created_at' => 'Created At',
        ];
    }
}
