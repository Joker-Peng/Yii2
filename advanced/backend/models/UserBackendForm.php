<?php

namespace backend\models;
use common\models\UserBackend;
use Yii;

/**
 * This is the model class for table "user_backend".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class UserBackendForm extends UserBackend
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_backend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'email'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
