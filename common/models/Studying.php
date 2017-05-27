<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "studying".
 *
 * @property integer $group_id
 * @property integer $subject_id
 * @property integer $teacher_id
 * @property string $lessons_type
 * @property integer $lessons_hours
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Progress[] $progresses
 * @property Groups $group
 * @property Subjects $subject
 * @property Teachers $teacher
 */
class Studying extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studying';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'subject_id', 'teacher_id', 'lessons_type', 'lessons_hours', 'created_at', 'updated_at'], 'required'],
            [['group_id', 'subject_id', 'teacher_id', 'lessons_hours'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['lessons_type'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'subject_id' => 'Subject ID',
            'teacher_id' => 'Teacher ID',
            'lessons_type' => 'Lessons Type',
            'lessons_hours' => 'Lessons Hours',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgresses()
    {
        return $this->hasMany(Progress::className(), ['group_id' => 'group_id', 'subject_id' => 'subject_id', 'teacher_id' => 'teacher_id', 'lessons_type' => 'lessons_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teacher_id']);
    }
}
