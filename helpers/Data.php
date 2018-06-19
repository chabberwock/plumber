<?php


namespace app\helpers;


use app\models\Account;
use app\models\Manager;
use app\models\Office;
use app\models\Worker;
use yii\helpers\ArrayHelper;

class Data
{
    public static function managers()
    {
        return ArrayHelper::map(Manager::find()->all(), 'id', 'name');
    }

    public static function accounts()
    {
        return ArrayHelper::map(Account::find()->all(), 'id', 'email');
    }

    public static function offices()
    {
        return ArrayHelper::map(Office::find()->all(), 'id', 'name');
    }
    
    public static function workers()
    {
        return ArrayHelper::map(Worker::find()->all(), 'id', 'name');
    }
    
    
}