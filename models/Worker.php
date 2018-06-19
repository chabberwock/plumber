<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker".
 *
 * @property int $id
 * @property int $office_id
 * @property int $account_id
 * @property string $name
 * @property string $phone
 */
class Worker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office_id', 'account_id'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 50],
        ];
    }
    
    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id'=>'account_id']);
    }
    
    public function getOffice()
    {
        return $this->hasOne(Office::class, ['id'=>'office_id']);
    }
    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'office_id' => 'Office ID',
            'account_id' => 'Account ID',
            'name' => 'Name',
            'phone' => 'Phone',
        ];
    }
}
