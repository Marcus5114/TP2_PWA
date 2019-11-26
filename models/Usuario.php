<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property string $username
 * @property string $name
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
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
            [['username'], 'unique'],
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
        ];
    }
}
