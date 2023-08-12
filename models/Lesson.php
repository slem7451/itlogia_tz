<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Lesson model
 *
 * @property integer $id
 * @property string $name
 * @property text $description
 * @property string $video
 */
class Lesson extends ActiveRecord
{
    public function getUser()
    {
        return $this->hasOne(CompleteLessonToUser::class, ['lesson_id' => 'id'])->where(['user_id' => Yii::$app->user->id]);
    }

    public static function findAllLessons()
    {
        return self::find()->all();
    }

    public static function findLessonById($id)
    {
        return self::findOne(['id' => $id]);
    }
}