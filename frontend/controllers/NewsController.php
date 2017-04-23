<?php

namespace frontend\controllers;

use common\models\News;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $news = new News();
        $dataProvider = $news->getPublishedPosts();
        return $this->render('index',[
                'news' => $dataProvider->models,
            ]
        );
    }

}
