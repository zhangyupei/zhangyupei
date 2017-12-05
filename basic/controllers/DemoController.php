<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use DfaFilter\SensitiveHelper;

class DemoController extends Controller
{
	public $enableCsrfValidation=false;//在类里面方法外面加上此句话
 

     //展示
    public function actionShow(){
    	// $da = \Yii::$app->db->createCommand("select * from zhuce");
     //    $data = $da->queryAll();
    	 $command = \Yii::$app->db->createCommand('SELECT * FROM zhuce');
        $po = $command->queryAll();
    	// print_r($po);
    	return $this->render("show",['data'=>$po]);
    }
    

    //添加页面展示
    public function actionAdd(){
    	return $this->render("add");
    }
     

     //ajax添加
    public function actionTian(){
// zdm:zdm,zdmrz:zdmrz,zdlx:zdlx,sfbx:sfbx,yzgz:yzgz,length:length
    	$req = \Yii::$app->request;
        $zdm = $req->post('zdm');
        $zdmrz = $req->post('zdmrz');
        $zdlx = $req->post('zdlx');
        $sfbx = $req->post('sfbx');
        $yzgz = $req->post('yzgz');
        $length = $req->post('length');

       $reg = \Yii::$app->db->createCommand()->insert('zhuce', ['zdm' => $zdm,'zdlx' => $zdlx,'zdmrz' => $zdmrz,'sfbx' => $sfbx,'yzgz' => $yzgz,'zfcxz' => $length])->execute();

       if($reg){
       	echo 1;
       }else{
       	echo 0;
       }
    }
     

     //ajx删除
    public function actionDel(){
    	$req = \Yii::$app->request;
    	$id = $req->post('id');
    	$reg = \Yii::$app->db->createCommand()->delete('zhuce','id='.$id)->execute();
    	if($reg){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    public function actionUplode(){
    	return $this->render('uplode');
    }

    public function actionYi(){
        return $this->render('yi');
    }

    public function actionEr(){

        return $this->render('er');
    }

    public function actionSan(){
        return $this->render('san');
    }

    public function actionGg(){
        $req = \Yii::$app->request;
        $sjh = $req->post('sjh');
        $mm = $req->post('mm');

        $nc = $req->post('nc');
        $sr = $req->post('sr');
        $gzdz = $req->post('gzdz');
       
        if($sjh && $mm){
            echo 1;
        }

        if($nc && $sr && $gzdz)
        {
            echo 1;
        }

        // $reg = \Yii::$app->db->createCommand()->insert('zk1',["sjh"=>$sjh,"mm"=>$mm,"nc"=>$nc,"sr"=>$sr,"gzdz"=>$gzdz])->execute();
        // if($reg){
        //     echo 1;die;
        // }else{
        //     echo 0;die;
        // }


    }


    public function actionQd(){
        echo 1;
        $obj->方法名($nc);
        $this->render("qd");
    }



 


}