<?php
    namespace app\controllers;

use app\models\order;
use app\models\shop;
    use yii\web\Controller;
    use Yii;
    use app\models\shopsearch;
use ArrayObject;
use Exception;
//use yii\bootstrap\Carousel;

    class ShopController extends Controller{
        public function actionIndex(){
            if(Yii::$app->request->isPost){
                if(isset($_POST['addtocart'])){
                    $datas = shop::find()->limit(1)->where(['id' => $_POST['addtocart']])->asArray()->one();
                    //Yii::$app->session->set('cart', new ArrayObject);
                    $cart = Yii::$app->session;
                    $_SESSION['cart'][] = array('id' => $datas['id'], 'name' => $datas['name'], 'price' => $datas['price'], 'count' => $_POST['count']);
                    if(isset($cart['cartcount'])){
                        $cart['cartcount'] += 1;
                    }else{
                        $cart['cartcount'] = 1;
                    }
                    $data = shopsearch::getall();
                }elseif(isset($_POST['name'])){
                    $data = shopsearch::byname($_POST['name']);
                }
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
        }public function actionCart(){
            
            if(Yii::$app->request->isPost){
                if(isset($_POST['delfromcart'])){
                    unset($_SESSION['cart'][$_POST['delfromcart']]);
                    $data = Yii::$app->session['cart'];
                    Yii::$app->session['cartcount'] -= 1;
                    return $this->render('cart', ['data' => $data]);
                }elseif(isset($_POST['cleancart'])){
                    unset(Yii::$app->session['cart']);
                    $data = Yii::$app->session['cart'];
                    Yii::$app->session['cartcount'] = 0;
                    return $this->render('cart', ['data' => $data]);
                }elseif(isset($_POST['processorder'])){
                    return $this->render('orderform');
                }elseif(isset($_POST['order'])){
                    $order = new order($_SESSION['cart']);
                    $order->setattr();
                    $order->addtodb();
                    unset($_SESSION['cart']);
                    $_SESSION['cartcount'] = 0;
                    return $this->redirect(['cart']);
                }

            }else{      
                $data = Yii::$app->session['cart']; 
                return $this->render('cart', ['data' => $data]);
            }
        }
    }
?>