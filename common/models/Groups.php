<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string $name
 * @property integer $speciality_id
 * @property string $date_create
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Specialties $speciality
 * @property Students[] $students
 * @property Studying[] $studyings
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'speciality_id', 'date_create', 'created_at', 'updated_at'], 'required'],
            [['speciality_id'], 'integer'],
            [['date_create', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialties::className(), 'targetAttribute' => ['speciality_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'speciality_id' => 'Speciality ID',
            'date_create' => 'Date Create',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Specialties::className(), ['id' => 'speciality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyings()
    {
        return $this->hasMany(Studying::className(), ['group_id' => 'id']);
    }
}
