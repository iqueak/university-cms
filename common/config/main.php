<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => common\components\DbManager::class,
            'cache' => 'cache',
            'defaultRoles' => ['user']
        ],
    ],

];
