<?php

namespace app\models;

use Yii;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $office;
    public $role;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $row = Yii::$app->db->createCommand('select * from account where id = :id')
            ->bindValue(':id', $id)
            ->queryOne();
        
        if ($row) {
            $result = new static([
                'id' => $row['id'],
                'username' => $row['email'],
                'password' => $row['password'],
                'authKey' => 'test' . $row['id'] . 'key',
                'accessToken' => $row['id'] . '-token'
            ]);
    
            return $result;
            
        }
        return null;
        
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $parts = explode('-', $token);
        return self::findIdentity($parts[0]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $id = Yii::$app->db->createCommand('select id from account where email = :email')
            ->bindValue(':email', $username)
            ->queryScalar();
        if ($id) {
            return self::findIdentity($id);
        } else {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
