<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $blog_id
 * @property int $user_id
 * @property int $blog_status_id
 * @property int $feedback_status_id
 * @property string $blog_content
 * @property string $blog_image
 * @property int $blog_view_count
 * @property int $sub_category_id
 * @property int $comment_id
 * @property string $created_at
 * @property string $update_at
 * @property int $feedback_id
 *
 * @property User $user
 * @property BlogStatus $blogStatus
 * @property FeedbackStatus $feedbackStatus
 * @property Comment $comment
 * @property Feedback $feedback
 * @property SubCategory $subCategory
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'user_id', 'blog_status_id', 'feedback_status_id', 'blog_content', 'sub_category_id', 'created_at', 'update_at', 'feedback_id'], 'required'],
            [['blog_id', 'user_id', 'blog_status_id', 'feedback_status_id', 'blog_view_count', 'sub_category_id', 'comment_id', 'feedback_id'], 'integer'],
            [['blog_image'], 'string'],
            [['created_at', 'update_at'], 'safe'],
            [['blog_content'], 'string', 'max' => 21000],
            [['blog_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['blog_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogStatus::className(), 'targetAttribute' => ['blog_status_id' => 'blog_status_id']],
            [['feedback_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => FeedbackStatus::className(), 'targetAttribute' => ['feedback_status_id' => 'feedback_status_id']],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'comment_id']],
            [['feedback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feedback::className(), 'targetAttribute' => ['feedback_id' => 'feedback_id']],
            [['sub_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategory::className(), 'targetAttribute' => ['sub_category_id' => 'sub_category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_id' => 'Blog ID',
            'user_id' => 'User ID',
            'blog_status_id' => 'Blog Status ID',
            'feedback_status_id' => 'Feedback Status ID',
            'blog_content' => 'Blog Content',
            'blog_image' => 'Blog Image',
            'blog_view_count' => 'Blog View Count',
            'sub_category_id' => 'Sub Category ID',
            'comment_id' => 'Comment ID',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'feedback_id' => 'Feedback ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogStatus()
    {
        return $this->hasOne(BlogStatus::className(), ['blog_status_id' => 'blog_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackStatus()
    {
        return $this->hasOne(FeedbackStatus::className(), ['feedback_status_id' => 'feedback_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['comment_id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::className(), ['feedback_id' => 'feedback_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::className(), ['sub_category_id' => 'sub_category_id']);
    }
}
