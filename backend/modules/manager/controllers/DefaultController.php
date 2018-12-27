<?php

namespace backend\modules\manager\controllers;

use yii\web\Controller;

/**
 * Default controller for the `manager` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model="Pham Anh Tai";
        return $this->render('index',['model'=>$model]);
    }
}
