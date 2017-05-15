<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $category_id
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $content
 * @property string $image_path
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property NewsCategory $category
 */
class News extends BasePost
{
    const STATUS_DRAFT = 0;
    const STATUS_DELETED = 2;
    const STATUS_PUBLISHED = 1;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'category_id', 'title', 'slug', 'status', 'created_at', 'updated_at'], 'required'],
            [['author_id', 'category_id', 'status'], 'integer'],
            [['summary', 'content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'image_path'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'summary' => 'Summary',
            'content' => 'Content',
            'image_path' => 'Image Path',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category_id']);
    }

    public function getNewsById($id){
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested post does not exist.');
        }
    }

    public function getPublishedPosts()
    {
        return new ActiveDataProvider([
            'query' => News::find()
                ->where(['status' => self::STATUS_PUBLISHED])
        ]);
    }
    public function getLatestPosts($limit)
    {
        return new ActiveDataProvider([
            'query' => News::find()->orderBy(['id' =>SORT_DESC])->limit((News::find()->count() < $limit) ? News::find()->count() : $limit),
            'pagination' => false,
        ]);

    }
}
