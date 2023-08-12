<?php
/** @var yii\web\View $this */

/** @var \app\models\Lesson $lesson */

use lesha724\youtubewidget\Youtube;
use yii\helpers\Html;

$this->title = $lesson->name;
?>
<div class="site-lesson">
    <h1 class="text-center"><?= $lesson->name ?></h1>
    <p><?= $lesson->description ?></p>
    <?= Youtube::widget([
        'video' => $lesson->video,
        'divOptions' => [
            'class' => 'text-center'
        ],
        'height' => 390,
        'width' => 640,
        'playerVars' => [
            'controls' => 1,
            'autoplay' => 0,
            'showinfo' => 0,
            'start' => 0,
            'end' => 0,
            'loop ' => 0,
            'modestbranding' => 1,
            'fs' => 1,
            'rel' => 0,
            'disablekb' => 0
        ]
    ]); ?>
    <div class="text-center">
        <?= Html::button('Урок просмотрен', ['class' => 'btn btn-success lesson-complete-btn', 'disabled' => !is_null($lesson->user)]) ?>
    </div>
</div>

<?php
$this->registerJs(<<<JS
    $(document).on('click', '.lesson-complete-btn', function() {
        const lesson_id = '{$lesson->id}';
        $.ajax({
            url: '/index.php?r=site%2Flesson&id=' + lesson_id,
            data: {isComplete: true},
            method: 'POST',
            success: function () {
                window.location.assign('/index.php');
            }
        });
    })
JS
);
