<?php

namespace app\controllers;

class CategorieController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Categorie';

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
