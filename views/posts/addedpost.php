<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    if($success){
        $chtoto =Yii::$app->request->getCsrfToken();
        print <<<_HTML_
            <p>Пост опубликован</p></br>
        _HTML_;
        print <<<_HTML_
            <form method="POST" action="/?r=posts/addpost" enctype="multipart/form-data">
                <input type="hidden" name="_csrf" value="{$chtoto}" />
                <textarea class="form-control mb-3" name="text" placeholder="Что у Вас нового?"></textarea>
                <label for="imgpost">Изображение для поста</label>
                <input  class="form-control-file mb-3" type="file" name="image" class="form-control-file" id="imgpost"/>
                <input  class="btn btn-primary" type="submit"/>
            </form>
        _HTML_;
            
    }else{
        $chtoto =Yii::$app->request->getCsrfToken();
        print <<<_HTML_
            <form method="POST" action="/?r=posts/addpost" enctype="multipart/form-data">
                <input type="hidden" name="_csrf" value="{$chtoto}" />
                <textarea class="form-control mb-3" name="text" placeholder="Что у Вас нового?"></textarea>
                <label for="imgpost">Изображение для поста</label>
                <input  class="form-control-file mb-3" type="file" name="image" class="form-control-file" id="imgpost"/>
                <input  class="btn btn-primary" type="submit"/>
            </form>
        _HTML_;
    }
?>