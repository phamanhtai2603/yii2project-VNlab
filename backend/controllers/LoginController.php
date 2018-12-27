<?php

namespace backend\controllers;
use backend\models\User;
use Yii;
class LoginController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model=new User();
        if($model->load(Yii::$app->request->post())){       //Nếu model có load request là true

            $request = Yii::$app->request->post('User');    //post user_name và password
            $username = $request['user_name'];
            $password = $request['password'];
            $id       = User::find()->where(['user_name'=>$username])->one()->user_id;
           // var_dump($id); exit;

            if($model->Login($username,$password)==true){
                Yii::$app->session->setFlash('LoginOK');

          //      $user_info=$model->Get_UserInfo($id);
                
            }else{
                // $this->redirect(Yii::$app->request->referrer); //Nếu đăng nhập sai thì trả lại web hiện tại
                Yii::$app->session->setFlash('LoginFail');
            }
        }    

        return $this->render('index',['model'=>$model]); //truyen bien $model thanh model cho view
    }


    public function actionUserInfo()
    {
        if($model->load(Yii::$app->request->post())){       //Nếu model có load request là true

            $id       = User::find()->where(['user_name'=>$username])->one()->user_id;
            var_dump($id); exit;

            if($model->Login($username,$password)==true){

                $user_info=$model->Get_UserInfo($id);
                
            }
        }    

        return $this->render('index2',['user_info'=>$user_info]); //truyen bien $model thanh model cho view
    }

}
