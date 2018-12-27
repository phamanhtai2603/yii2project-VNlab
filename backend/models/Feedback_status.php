<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback_status".
 *
 * @property int $feedback_status_id
 * @property string $feedback_status_name
 *
 * @property Blog[] $blogs
 * @property Feedback[] $feedbacks
 */
class Feedback_status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback_status_id'], 'required'],
            [['feedback_status_id'], 'integer'],
            [['feedback_status_name'], 'string', 'max' => 50],
            [['feedback_status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'feedback_status_id' => 'Feedback Status ID',
            'feedback_status_name' => 'Feedback Status Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['feedback_status_id' => 'feedback_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['feedback_status_id' => 'feedback_status_id']);
    }
}
