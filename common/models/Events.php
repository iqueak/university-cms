<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $organizer
 * @property integer $category_id
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $content
 * @property string $image_path
 * @property integer $status
 * @property string $event_date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property EventsCategory $category
 */
class Events extends BasePost
{
    const STATUS_FUTURE = 1;
    const STATUS_TOMORROW = 3;
    const STATUS_JUST_NOW = 2;
    const STATUS_NEAR_PAST = 1;
    const STATUS_PAST = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'organizer', 'category_id', 'title', 'slug', 'status', 'event_date', 'created_at', 'updated_at'], 'required'],
            [['author_id', 'category_id', 'status'], 'integer'],
            [['summary', 'content'], 'string'],
            [['event_date', 'created_at', 'updated_at'], 'safe'],
            [['organizer', 'title', 'slug', 'image_path'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventsCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'organizer' => 'Organizer',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'summary' => 'Summary',
            'content' => 'Content',
            'image_path' => 'Image Path',
            'status' => 'Status',
            'event_date' => 'Event Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(EventsCategory::className(), ['id' => 'category_id']);
    }

    public function getPublishedEvents()
    {
        return new ActiveDataProvider([
            'query' => Events::find()
                ->where(['status' => self::STATUS_FUTURE])
        ]);
    }
    public function getLatestEvents($limit)
    {
        return new ActiveDataProvider([
            'query' => Events::find()->orderBy(['id' =>SORT_DESC])->limit((Events::find()->count() < $limit) ? Events::find()->count() : $limit),
            'pagination' => false,
        ]);

    }
}
