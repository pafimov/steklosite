<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    print '<h1>Posts</h1></br>';
    foreach($posts as $post){
        $text = Html::encode($post['text']);
        print <<<_HTML_
            {$text}</br>
            <img src="{$post['imgpath']}" width= 30%></br>
            {$post['time']}</br>
        _HTML_;
    }
    print LinkPager::widget(['pagination' => $pagination]);
?>