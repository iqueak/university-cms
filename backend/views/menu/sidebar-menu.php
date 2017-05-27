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
            ],
            [
                'label' => Yii::t('app', 'FOR ADMINISTRATOR'),
                'options' => [
                    'class' => 'header',
                ],
                'visible' => (
                    Yii::$app->user->can('BViewUsers') ||
                    Yii::$app->user->can('BViewAssignments') ||
                    Yii::$app->user->can('BViewRoles') ||
                    Yii::$app->user->can('BViewPermissions') ||
                    Yii::$app->user->can('BViewRules')
                )
            ],
            [
                'label' => Yii::t('app', 'User Management'),
                'url' => ['#'],
                'icon' => 'fa fa-users',
                'options' => [
                    'class' => 'treeview',
                ],
                'visible' => Yii::$app->user->can('BViewUsers'),
                'items' => [
                    [
                        'label' => Yii::t('app', 'Users'),
                        'url' => ['user/index'],
                        'icon' => 'fa fa-user',
                        'visible' => Yii::$app->user->can('BViewUsers'),
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
                'visible' => (
                    Yii::$app->user->can('BViewAssignments') ||
                    Yii::$app->user->can('BViewRoles') ||
                    Yii::$app->user->can('BViewPermissions') ||
                    Yii::$app->user->can('BViewRules')
                ),
                'items' => [
                    [
                        'label' => Yii::t('app', 'Assignments'),
                        'url' => ['assignment/index'],
                        'icon' => 'fa fa-key',
                        //'visible' => (Yii::$app->user->identity->username == 'admin'),
                        'visible' => Yii::$app->user->can('BViewAssignments'),
                    ],
                    [
                        'label' => Yii::t('app', 'Roles'),
                        'url' => ['role/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('BViewRoles'),
                    ],
                    [
                        'label' => Yii::t('app', 'Permissions'),
                        'url' => ['permission/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('BViewPermissions'),
                    ],
                    [
                        'label' => Yii::t('app', 'Rules'),
                        'url' => ['rule/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('BViewRules'),
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
                'label' => Yii::t('app', 'Studying'),
                'url' => ['#'],
                'icon' => 'fa fa-book',
                'options' => [
                    'class' => 'treeview',
                ],
                'visible' => (
                    Yii::$app->user->can('STDViewStudents') ||
                    Yii::$app->user->can('STDViewGroups') ||
                    Yii::$app->user->can('STDViewTeachers') ||
                    Yii::$app->user->can('STDViewCathedres') ||
                    Yii::$app->user->can('STDViewSubjects') ||
                    Yii::$app->user->can('STDViewSpecialties') ||
                    Yii::$app->user->can('STDViewStudying') ||
                    Yii::$app->user->can('STDViewProgress')
                ),
                'items' => [
                    [
                        'label' => Yii::t('app', 'Students'),
                        'url' => ['students/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewStudents'),
                    ],
                    [
                        'label' => Yii::t('app', 'Groups'),
                        'url' => ['groups/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewGroups'),
                    ],
                    [
                        'label' => Yii::t('app', 'Teachers'),
                        'url' => ['teachers/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewTeachers'),
                    ],
                    [
                        'label' => Yii::t('app', 'Cathedres'),
                        'url' => ['cathedres/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewCathedres'),
                    ],
                    [
                        'label' => Yii::t('app', 'Subjects'),
                        'url' => ['subjects/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewSubjects'),
                    ],
                    [
                        'label' => Yii::t('app', 'Specialties'),
                        'url' => ['specialties/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewSpecialties'),
                    ],
                    [
                        'label' => Yii::t('app', 'Studying'),
                        'url' => ['studying/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewStudying'),
                    ],
                    [
                        'label' => Yii::t('app', 'Progress'),
                        'url' => ['progress/index'],
                        'icon' => 'fa fa-key',
                        'visible' => Yii::$app->user->can('STDViewProgress'),
                    ],
                ],
            ],
            [
                'label' => Yii::t('app', 'Blog'),
                'url' => ['#'],
                'icon' => 'fa fa-book',
                'options' => [
                    'class' => 'treeview',
                ],
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
                ],
            ],
        ]
    ]
);
