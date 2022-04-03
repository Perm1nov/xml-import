<?php

/** @var yii\web\View $this */

/* @var $text string */

use yii\bootstrap4\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?= Html::a(
        'Parse XML',
        ['/site/parse'],
        [
            'class' => 'btn btn-primary',
            'style' => 'margin-top: auto; margin-bottom: auto;',
        ]
    )
    ?>
    <?= $text ?? '' ?>
</div>
