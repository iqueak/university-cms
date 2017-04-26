<?php
use backend\widgets\LTEMenu;

echo LTEMenu::widget(
    [
        'options' => [
            'class' => 'sidebar-menu'
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Dashboard'),
                'url' => Yii::$app->homeUrl,
                'icon' => 'fa-dashboard',
                'active' => Yii::$app->request->url === Yii::$app->homeUrl,
            ],
            [
                'label' => Yii::t('app', 'FOR ADMINISTRATOR'),
                'options' => [
                    'class' => 'header',
                ],
            ],
            [
                'label' => Yii::t('app', 'User Management'),
                'url' => ['#'],
                'icon' => 'fa fa-users',
                'options' => [
                    'class' => 'treeview',
                ],
                'active' => Yii::$app->request->url === Yii::$app->homeUrl,
                'items' => [
                    [
                        'label' => Yii::t('app', 'Users'),
                        'url' => ['events/index'],
                        'icon' => 'fa fa-user',
                    ],
                ],
            ],
            [
                'label' => Yii::t('app', 'User Permissions'),
                'url' => ['#'],
                'icon' => 'fa fa-lock',
                'options' => [
                    'class' => 'treeview',
                ],
                'active' => Yii::$app->request->url === Yii::$app->homeUrl,
                'items' => [
                    [
                        'label' => Yii::t('app', 'Assignments'),
                        'url' => ['assignment/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Roles'),
                        'url' => ['role/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Permissions'),
                        'url' => ['permission/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Rules'),
                        'url' => ['rule/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Routes'),
                        'url' => ['route/index'],
                        'icon' => 'fa fa-key',
                    ],
                ],
            ],
            [
                'label' => Yii::t('app', 'Main menu'),
                'options' => [
                    'class' => 'header',
                ]
            ],
            [
                'label' => Yii::t('app', 'Blog'),
                'url' => ['#'],
                'icon' => 'fa fa-book',
                'options' => [
                    'class' => 'treeview',
                ],
                'active' => Yii::$app->request->url === Yii::$app->homeUrl,
                'items' => [
                    [
                        'label' => Yii::t('app', 'News'),
                        'url' => ['news/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'News category'),
                        'url' => ['news-category/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Events'),
                        'url' => ['events/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Events category'),
                        'url' => ['events-category/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Blog menu items'),
                        'url' => ['blog-menu-items/index'],
                        'icon' => 'fa fa-key',
                    ],
                    [
                        'label' => Yii::t('app', 'Images'),
                        'url' => ['images/index'],
                        'icon' => 'fa fa-key',
                    ],
                ],
            ],
        ]
    ]
);
