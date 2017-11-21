<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "points".
 *
 * @property integer $id
 * @property integer $u_id
 * @property string $shnappunkte
 * @property string $rabatppunkte
 */
class Points extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'points';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id'], 'required'],
            [['u_id'], 'integer'],
            [['shnappunkte', 'rabatppunkte'], 'number'],
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
            'shnappunkte' => 'Shnappunkte',
            'rabatppunkte' => 'Rabatppunkte',
        ];
    }
}
