<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<div class="wrapper-simple">
    <section class="content error">

        <div class="error-page">
            <h2 class="headline text-yellow"><?= $exception->statusCode ?></h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! <?= $message ?>.</h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href='<?= Url::to('/') ?>'>return to dashboard</a> or try using the search
                    form.
                </p>

                <!--<form class='search-form'>
                    <div class='input-group'>
                        <input type="text" name="search" class='form-control' placeholder="Search"/>

                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    </section>
</div>
