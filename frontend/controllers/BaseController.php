<?php namespace frontend\controllers;

use common\models\Events;
use common\models\MainMenu;
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
        $main_menu = new MainMenu();
        $dataProvider = $main_menu->getMenuElements();
        return $this->renderPartial('@app/views/main_menu/index', [
            'main_menu' => $dataProvider->models,
        ]);
    }
}
