<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $admin_id
 * @property string $admin_name
 * @property string $admin_email
 * @property string $admin_password
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    public function Get_All_Admin(){
        return Admin::find()->all();

    }

    public function Get_Admin($id){
        return Admin::findOne($id);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'admin_name', 'admin_email', 'admin_password'], 'required'],
            [['admin_id'], 'integer'],
            [['admin_name'], 'string', 'max' => 5],
            [['admin_email', 'admin_password'], 'string', 'max' => 50],
            [['admin_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_name' => 'Admin Name',
            'admin_email' => 'Admin Email',
            'admin_password' => 'Admin Password',
        ];
    }
}
