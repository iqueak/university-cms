<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specialties".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cathedra_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Groups[] $groups
 * @property Cathedres $cathedra
 */
class Specialties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cathedra_id', 'created_at', 'updated_at'], 'required'],
            [['cathedra_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['cathedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cathedres::className(), 'targetAttribute' => ['cathedra_id' => 'id']],
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
            'cathedra_id' => 'Cathedra ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['speciality_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCathedra()
    {
        return $this->hasOne(Cathedres::className(), ['id' => 'cathedra_id']);
    }
}
