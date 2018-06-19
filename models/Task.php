<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property int $office_id
 * @property int $manager_id
 * @property int $worker_id
 * @property string $scheduled_time
 * @property string $title
 * @property string $description
 * @property string $address
 * @property string $phone
 * @property string $price
 * @property int $status
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office_id', 'manager_id', 'worker_id', 'status'], 'integer'],
            [['scheduled_time'], 'safe'],
            [['description'], 'string'],
            [['title', 'address', 'phone', 'price'], 'string', 'max' => 100],
        ];
    }
    
    public function getManager()
    {
        return $this->hasOne(Manager::class, ['id'=>'manager_id']);
    }

    public function getWorker()
    {
        return $this->hasOne(Worker::class, ['id'=>'worker_id']);
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
            'manager_id' => 'Manager ID',
            'worker_id' => 'Worker ID',
            'scheduled_time' => 'Scheduled Time',
            'title' => 'Title',
            'description' => 'Description',
            'address' => 'Address',
            'phone' => 'Phone',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }
}
