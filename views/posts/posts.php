<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    print '<div class="row">';
    if($admin == 1){
        $chtoto =Yii::$app->request->getCsrfToken();
        foreach($posts as $post){
            $text = Html::encode($post['text']);
            print <<<_HTML_
                <div class="card col-12 col-sm-6 col-md-4 col-lg-3 shadow">
                <div class="inner">
                <img src="{$post['imgpath']}" class="card-img-top img-fluid" alt="...">
                </div>
                <div class="card-body">
                <p class="card-text">{$post['text']}</p>
                </div>
                <div class="card-footer">
                 <small class="text-muted">{$post['time']}</small>
                 <form method="POST" action="/?r=posts/edit">
                    <input type="hidden" name="_csrf" value="{$chtoto}" />
                    <input class="form-control" type="text" name="newtext"/>
                    <button class="btn btn-primary mr-2 mt-2" name="editpost" value="{$post['nomer']}">Редактировать</button>
                    <button class="btn btn-primary mt-2" name="deletepost" value="{$post['nomer']}">X</button>
                 </form>
                </div>
                </div>
            _HTML_;
        }
    }else{
    foreach($posts as $post){
        $text = Html::encode($post['text']);
        print <<<_HTML_
            <div class="card col-12 col-sm-6 col-md-4 col-lg-3 shadow">
            <div class="inner">
            <img src="{$post['imgpath']}" class="card-img-top img-fluid" alt="...">
            </div>
            <div class="card-body">
            <p class="card-text">{$post['text']}</p>
            </div>
            <div class="card-footer">
             <small class="text-muted">{$post['time']}</small>
            </div>
            </div>
        _HTML_;
    }
    }
    print '</div>';
    print LinkPager::widget(['pagination' => $pagination]);
?>