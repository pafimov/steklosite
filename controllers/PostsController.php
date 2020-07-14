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
            return $this->render('posts', ['posts' => $posts, 'pagination' => $pagination]);
        }
        public function actionAddpost(){
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
        }
    }
?>