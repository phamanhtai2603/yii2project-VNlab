<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_status".
 *
 * @property int $user_status_id
 * @property string $user_status_name
 *
 * @property User[] $users
 */
class UserStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc
     */
    public static function tableName()
    {
        return 'userstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_status_id', 'user_status_name'], 'required'],
            [['user_status_id'], 'integer'],
            [['user_status_name'], 'string', 'max' => 50],
            [['user_status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_status_id' => 'User Status ID',
            'user_status_name' => 'User Status Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_status_id' => 'user_status_id']);
    }
}
