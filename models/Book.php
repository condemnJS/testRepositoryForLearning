<?php


namespace app\models;

use yii\base\Model;
use app\models\Author;
use app\models\Review;

class Book extends Model
{
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'book_id'])
            ->viaTable('book_has_author', ['author_id' => 'id']);
    }

    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['book_id' => 'id']);
    }
    public function behaviors()
    {
        return [
          [
              'class' => \voskobovich\behaviors\ManyToManyNehavior::className(),
              'relations' => [
                  'author_list' => ['authors'],
                  'review_list' => ['reviews']
              ]
          ]
        ];
    }
}