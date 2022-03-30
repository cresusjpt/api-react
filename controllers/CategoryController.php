<?php

namespace app\controllers;

class CategoryController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Category';

    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::class,
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

}
