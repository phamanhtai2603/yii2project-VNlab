<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_category".
 *
 * @property int $sub_category_id
 * @property int $category_id
 * @property string $sub_category_title
 * @property string $sub_categogy_content
 * @property string $created_at
 * @property string $update_at
 *
 * @property Blog[] $blogs
 * @property Categogy $category
 */
class Sub_category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_category_id', 'category_id', 'sub_category_title', 'sub_categogy_content', 'created_at', 'update_at'], 'required'],
            [['sub_category_id', 'category_id'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['sub_category_title'], 'string', 'max' => 100],
            [['sub_categogy_content'], 'string', 'max' => 21000],
            [['sub_category_id'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categogy::className(), 'targetAttribute' => ['category_id' => 'categogy_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sub_category_id' => 'Sub Category ID',
            'category_id' => 'Category ID',
            'sub_category_title' => 'Sub Category Title',
            'sub_categogy_content' => 'Sub Categogy Content',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['sub_category_id' => 'sub_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categogy::className(), ['categogy_id' => 'category_id']);
    }
}
