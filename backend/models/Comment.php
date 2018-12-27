<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $comment_id
 * @property int $user_id
 * @property int $blog_id
 * @property string $comment_content
 * @property string $created_at
 * @property string $update_at
 *
 * @property Blog[] $blogs
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_id', 'user_id', 'blog_id', 'comment_content', 'created_at', 'update_at'], 'required'],
            [['comment_id', 'user_id', 'blog_id'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['comment_content'], 'string', 'max' => 21000],
            [['comment_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'blog_id' => 'Blog ID',
            'comment_content' => 'Comment Content',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['comment_id' => 'comment_id']);
    }
}
