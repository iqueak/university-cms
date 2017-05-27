<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $cathedra_id
 * @property integer $rank
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Studying[] $studyings
 * @property Cathedres $cathedra
 * @property User $user
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'middle_name', 'last_name', 'cathedra_id', 'rank', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['cathedra_id', 'rank', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 255],
            [['cathedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cathedres::className(), 'targetAttribute' => ['cathedra_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'cathedra_id' => 'Cathedra ID',
            'rank' => 'Rank',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyings()
    {
        return $this->hasMany(Studying::className(), ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCathedra()
    {
        return $this->hasOne(Cathedres::className(), ['id' => 'cathedra_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
