<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categogy".
 *
 * @property int $categogy_id
 * @property string $categogy_title
 * @property string $categogy_content
 * @property string $created_at
 * @property string $update_at
 *
 * @property SubCategory[] $subCategories
 */
class Categogy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categogy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categogy_id', 'categogy_title', 'categogy_content', 'created_at', 'update_at'], 'required'],
            [['categogy_id'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['categogy_title'], 'string', 'max' => 100],
            [['categogy_content'], 'string', 'max' => 21000],
            [['categogy_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categogy_id' => 'Categogy ID',
            'categogy_title' => 'Categogy Title',
            'categogy_content' => 'Categogy Content',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategories()
    {
        return $this->hasMany(SubCategory::className(), ['category_id' => 'categogy_id']);
    }
}
