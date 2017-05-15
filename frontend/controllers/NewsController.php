<?php

namespace frontend\controllers;

use common\models\News;

class NewsController extends BaseController
{
    public $countLatestPosts = 3;
    public function actionIndex()
    {
        $news = new News();
        $dataProvider = $news->getPublishedPosts();
        $latestPosts = $news->getLatestPosts($this->countLatestPosts);
        return $this->render('index',[
                'news' => $dataProvider->models,
                'latest_news' => $latestPosts->models,
            ]
        );
    }
    public function actionView($id)
    {
        $news = new News();
        return $this->render('view',[
                'post' => $news->getNewsById($id),
            ]
        );
    }

}
