<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_status".
 *
 * @property int $blog_status_id
 * @property int $blog_status_block
 *
 * @property Blog[] $blogs
 */
class Blog_status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_status_id', 'blog_status_block'], 'required'],
            [['blog_status_id', 'blog_status_block'], 'integer'],
            [['blog_status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_status_id' => 'Blog Status ID',
            'blog_status_block' => 'Blog Status Block',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['blog_status_id' => 'blog_status_id']);
    }
}
