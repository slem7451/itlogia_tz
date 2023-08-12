<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Lesson model
 *
 * @property integer $user_id
 * @property string $lesson_id
 */
class CompleteLessonToUser extends ActiveRecord
{
    public static function completeLessonForUser($lesson_id)
    {
        $lessonToUser = new CompleteLessonToUser();
        $lessonToUser->lesson_id = $lesson_id;
        $lessonToUser->user_id = Yii::$app->user->id;
        return $lessonToUser->save();
    }

    public static function findCompleteLessonsForUser()
    {
        return self::findAll(['user_id' => Yii::$app->user->id]);
    }
}