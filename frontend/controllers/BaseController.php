<?php namespace frontend\controllers;

use common\models\BlogMenuItems;
use common\models\Events;
use Yii;
use yii\base\Module;
use yii\web\Controller;

class BaseController extends Controller
{
    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);

        Yii::$app->view->params['events_render'] = $this->renderEvents();
        Yii::$app->view->params['menu_render'] = $this->renderMenu();
    }

    public function renderEvents() {
        $events = new Events();
        $dataProvider = $events->getPublishedEvents();
        return $this->renderPartial('@app/views/events/index', [
            'events' => $dataProvider->models,
        ]);
    }
    public function renderMenu() {
        $blog_menu_items = new BlogMenuItems();
        $dataProvider = $blog_menu_items->getMenuElements();
        return $this->renderPartial('@app/views/blog_menu_items/index', [
            'blog_menu_items' => $dataProvider->models,
        ]);
    }
}
