<?php
    namespace app\controllers;
    header("content-type:image/jpeg");

    use yii\data\Pagination;
    use yii\web\Controller;
    use app\models\posts;
    use app\models\addpost;
    use Yii;
    use yii\helpers\Html;
    use yii\web\UploadedFile as WebUploadedFile;

class PostsController extends Controller{
        public function actionIndex()
        {
            $pagination = new Pagination([
                'defaultPageSize' => 1,
                'totalCount' => posts::find()->count()
            ]);
            $posts = posts::find()->orderBy('time')->offset($pagination->offset)->limit($pagination->limit)->all();
            return $this->render('posts', ['posts' => $posts, 'pagination' => $pagination]);
        }
        public function actionImgcntrl($id){
            $idt = filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => -1)));
            if($idt){
                //var_dump($id);
                //$idt = (int)$id;
                $img = posts::find()->where(['nomer' => $idt])->one();
                $imagecontent=base64_decode($img['image']);
                print $imagecontent;
            }elseif($idt=0){
                $img = posts::find()->where(['nomer' => $idt])->one();
                $imagecontent=base64_decode($img['image']);
                print $imagecontent;
            }
        }
        public function actionAddpost(){
            $model = new addpost();
            if(Yii::$app->request->isPost){
                $model->image = WebUploadedFile::getInstance($model, 'image');
                //$model->load(Yii::$app->request->post('text'));
                //var_dump($_POST['text']);
                //$model->text = Yii::$app->request->post(Html::getInputName($model, 'text'));
                //$model->load(Yii::$app->request->post('addpost[text]'));
                //$model->text = Yii::$app->request->post('text');
                $model->text = $_POST['addpost']['text'];
                $model->timer = date("Y-m-d H:i:s");
                $sp = $model->savephoto();
                if($sp){
                    $model->addtodb();
                    return $this->render('addedpost', ['model' => $model, 'success' => true]);                   
                }else{
                    return $this->render('addedpost', ['model' => $model, 'success' => false, 'sp' =>$sp]);
                }
            }else{
                return $this->render('addedpost', ['model' => $model, 'success' => false]);
            }
        }
    }
?>