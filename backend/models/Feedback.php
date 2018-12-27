<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $feedback_id
 * @property int $user_id
 * @property int $blog_id
 * @property string $feedback_content
 * @property string $created_at
 * @property string $update_at
 * @property int $feedback_status_id
 *
 * @property Blog[] $blogs
 * @property FeedbackStatus $feedbackStatus
 * @property User $user
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback_id', 'user_id', 'blog_id', 'feedback_content', 'created_at', 'update_at', 'feedback_status_id'], 'required'],
            [['feedback_id', 'user_id', 'blog_id', 'feedback_status_id'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['feedback_content'], 'string', 'max' => 21000],
            [['feedback_id'], 'unique'],
            [['feedback_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => FeedbackStatus::className(), 'targetAttribute' => ['feedback_status_id' => 'feedback_status_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'feedback_id' => 'Feedback ID',
            'user_id' => 'User ID',
            'blog_id' => 'Blog ID',
            'feedback_content' => 'Feedback Content',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'feedback_status_id' => 'Feedback Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['feedback_id' => 'feedback_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
