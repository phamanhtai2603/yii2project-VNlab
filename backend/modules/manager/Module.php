<?php

namespace backend\modules\manager;

/**
 * manager module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\manager\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->layout='adminlayout';
        // custom initialization code goes here
    }
}
