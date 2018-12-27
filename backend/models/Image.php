<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $img_id
 * @property string $img_name
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_id'], 'required'],
            [['img_id'], 'integer'],
            [['img_name'], 'string', 'max' => 50],
            [['img_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img_id' => 'Img ID',
            'img_name' => 'Img Name',
        ];
    }
}
