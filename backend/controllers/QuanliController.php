<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Admin;

class QuanliController extends Controller{

    public function actionAdmin(){
        $admin = new Admin();
        $tbl_admin=$admin->Get_All_Admin();
        //var_dump($tbl_admin);
        $one_admin=$admin->Get_Admin(3);
        //var_dump($one_admin);
        return $this->render('index',['admin'=>$tbl_admin,'one'=>$one_admin]); //Bien 'admin' va 'one' se duoc dung o trong view/index.php
    }

    
}
  

?>