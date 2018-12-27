<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $user_name
 * @property string $email
 * @property string $password
 * @property string $created_at
 * @property string $update_at
 * @property int $user_status_id
 *
 * @property Blog[] $blogs
 * @property Feedback[] $feedbacks
 * @property UserStatus $userStatus
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_name', 'password'], 'required','message'=>'It is empty!'],
            [['user_id', 'user_status_id'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['user_name', 'email', 'password'], 'string', 'max' => 50],
            [['user_id'], 'unique'],
            [['user_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserStatus::className(), 'targetAttribute' => ['user_status_id' => 'user_status_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'email' => 'Email',
            'password' => 'Password',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'user_status_id' => 'User Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserStatus()
    {
        return $this->hasOne(UserStatus::className(), ['user_status_id' => 'user_status_id']);
    }

//Tạo hàm KT đăng nhập
    public function Login($username,$password){
        $dong=User::find()->where(['user_name'=>$username,'password'=>$password])->count();
        if($dong==1){
            return true;
        }else return false; 

    }

    public function Get_UserInfo($id){
        return User::findOne($id);
    }



}
