<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property int $id
 * @property string $name
 * @property int $account_id
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'account_id'], 'required'],
            [['account_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'account_id' => 'Account ID',
        ];
    }
}
