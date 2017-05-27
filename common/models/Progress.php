<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "progress".
 *
 * @property integer $group_id
 * @property integer $student_id
 * @property integer $subject_id
 * @property integer $teacher_id
 * @property string $lessons_type
 * @property string $date_eval
 * @property integer $work_id
 * @property integer $value
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Students $group
 * @property Studying $group0
 */
class Progress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'student_id', 'subject_id', 'teacher_id', 'lessons_type', 'date_eval', 'work_id', 'value', 'created_at', 'updated_at'], 'required'],
            [['group_id', 'student_id', 'subject_id', 'teacher_id', 'work_id', 'value'], 'integer'],
            [['date_eval', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['lessons_type'], 'string', 'max' => 255],
            [['group_id', 'student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['group_id' => 'group_id', 'student_id' => 'student_id']],
            [['group_id', 'subject_id', 'teacher_id', 'lessons_type'], 'exist', 'skipOnError' => true, 'targetClass' => Studying::className(), 'targetAttribute' => ['group_id' => 'group_id', 'subject_id' => 'subject_id', 'teacher_id' => 'teacher_id', 'lessons_type' => 'lessons_type']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'student_id' => 'Student ID',
            'subject_id' => 'Subject ID',
            'teacher_id' => 'Teacher ID',
            'lessons_type' => 'Lessons Type',
            'date_eval' => 'Date Eval',
            'work_id' => 'Work ID',
            'value' => 'Value',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Students::className(), ['group_id' => 'group_id', 'student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup0()
    {
        return $this->hasOne(Studying::className(), ['group_id' => 'group_id', 'subject_id' => 'subject_id', 'teacher_id' => 'teacher_id', 'lessons_type' => 'lessons_type']);
    }
}
