<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property string $username
 * @property string $name
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property int $id
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name'], 'required'],
            [['username', 'name'], 'string', 'max' => 80],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'name' => 'Name',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'id' => 'ID',
        ];
    }

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccesToken ($token, $type=null) {
        return self::findOne(['accesToken'=>$token]);
    }

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public function getId(){
        return $this->id;
    }

    public function fetAuthKey(){
        return $this->authKey;
    }

    public function validateAuthKey($authKey){
        return $this->authKey ===$authKey;
    }
    
    public function validatePassword($password){
        return password_verify($password, $this->password);
    }
}
