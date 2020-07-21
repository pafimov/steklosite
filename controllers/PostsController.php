<?php
    namespace app\controllers;

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
                'defaultPageSize' => 8,
                'totalCount' => posts::find()->count()
            ]);
            $posts = posts::find()->orderBy('time')->offset($pagination->offset)->limit($pagination->limit)->all();
            return $this->render('posts', ['posts' => $posts, 'pagination' => $pagination, 'admin' => 0]);
        }
        public function actionAddpost(){
            if($_SESSION['logged'] == 1){
            $model = new addpost();
            if(Yii::$app->request->isPost){
                $model->image = WebUploadedFile::getInstanceByName('image');
                $model->text = $_POST['text'];
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
            }else{
                header('Location: /?r=site/admin');
                print 'lol';
                exit;
            }
        }
        public function actionEdit(){
            if($_SESSION['logged'] == 1){
                if(Yii::$app->request->isPost){
                    if(isset($_POST['editpost'])){
                        posts::updateAll(['text' => $_POST['newtext']], ['nomer' => $_POST['editpost']]);
                    }elseif(isset($_POST['deletepost'])){
                        $dpost = posts::findOne($_POST['deletepost']);
                        $dpost->delete();
                    }
                }
                $pagination = new Pagination([
                    'defaultPageSize' => 8,
                    'totalCount' => posts::find()->count()
                ]);
                $posts = posts::find()->asArray()->offset($pagination->offset)->limit($pagination->limit)->orderBy('time')->all();
                return $this->render('posts', ['posts' => $posts, 'pagination' => $pagination, 'admin' => 1]);
            }else{
                header('Location: /?r=site/admin');
                print 'lol';
                exit;
            }
        }
    }
?>