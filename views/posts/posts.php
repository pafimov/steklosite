<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    print '<div class="row">';
    foreach($posts as $post){
        $text = Html::encode($post['text']);
        print <<<_HTML_
            <div class="card col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="{$post['imgpath']}" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">{$post['text']}</p>
            </div>
            <div class="card-footer">
             <small class="text-muted">{$post['time']}</small>
            </div>
            </div>
        _HTML_;
    }
    print '</div>';
    print LinkPager::widget(['pagination' => $pagination]);
?>