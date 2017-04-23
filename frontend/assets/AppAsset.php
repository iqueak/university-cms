<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'vendor/css/bootstrap.min.css',
        'vendor/css/font-awesome.min.css',
        'vendor/css/animate.min.css',
        'css/application.min.css',
    ];
    public $js = [
        'vendor/jquery.min.js',
        'vendor/js/bootstrap.min.js',
        'vendor/js/animate-css.min.js',
        'js/bxslider/jquery.bxslider-4.1.2.min.js',
        'js/application.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
