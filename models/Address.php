<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $zip
 * @property string $city
 * @property string $state
 * @property string $province
 * @property string $street
 * @property string $house
 * @property string $floor
 * @property string $door
 * @property string $notes
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id'], 'integer'],
            [['notes'], 'string'],
            [['zip', 'city', 'state', 'province', 'street', 'house', 'floor', 'door'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'zip' => 'Zip',
            'city' => 'City',
            'state' => 'State',
            'province' => 'Province',
            'street' => 'Street',
            'house' => 'House',
            'floor' => 'Floor',
            'door' => 'Door',
            'notes' => 'Notes',
        ];
    }
}
