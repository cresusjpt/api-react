<?php

namespace app\controllers;

class ProductController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Product';

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
