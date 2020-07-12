<?php
    namespace app\controllers;

    use app\models\shop;
    use yii\web\Controller;
    use Yii;
    use app\models\shopsearch;
use Exception;
//use yii\bootstrap\Carousel;

    class ShopController extends Controller{
        public function actionIndex(){
            if(Yii::$app->request->isPost){
                //$data = shop::search($_POST['name']);
                //$data = shop::find()->orderBy('name')->where(['name' => $_POST['name']])->all();
                $data = shopsearch::byname($_POST['name']);
            }else{
                //$data = shop::getall();
                //$data = shop::find()->orderBy('name')->all();
                $data = shopsearch::getall();
            }
            return $this->render('shop', ['data' => $data]);
        }
        public function actionThing($id){
            //$nid = (int)$id;
            //var_dump($nid);
            //$data = shop::searchbyid($nid);
            //$data = shop::find()->where(['id' => $nid])->asArray()->one();
            $data = shopsearch::byid($id);
            //var_dump($data);
            if(!$data){
                $data['success'] = false;
            }
            //var_dump($data['name']);
            return $this->render('thing', ['data' => $data]);
        }
        public function actionCreate(){
            if(Yii::$app->request->isPost){
                try{
                    $thing = new shop();
                    $thing->setattr();
                    $thing->savetodb();
                }catch(Exception $e){
                    print $e;
                    exit;
                    return $this->render('creatething', ['success' => false]);
                }
                return $this->render('creatething', ['success' => true]);
            }else{
                return $this->render('creatething', ['success' => false]);
            }
        }
    }
?>