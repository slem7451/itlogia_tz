<?php

/** @var yii\web\View $this */
/** @var \app\models\Lesson $lessons */
/** @var \app\models\CompleteLessonToUser $completedLessons */

use yii\helpers\Html;

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <?php if (count($lessons) == count($completedLessons)): ?>
        <h1 class="text-center">Курс пройден</h1>
    <?php endif; ?>
    <?php foreach ($lessons as $index => $lesson): ?>
        <div class="lesson">
            <?= Html::a('Урок №' . ($index + 1) . '. ' . $lesson->name, ['lesson', 'id' => $lesson->id], [
                    'class' => $lesson->user ? 'completed' : 'not-completed'
            ]) ?>
        </div>
    <?php endforeach; ?>
</div>
