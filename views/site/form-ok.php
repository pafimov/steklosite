<?php
    use yii\helpers\Html;
    $nm = Html::encode($model->name);
    $em = Html::encode($model->email);
    $ph = Html::encode($model->phone);
    print <<<_HTML_
        <pre>name: {$nm}</pre>
        <pre>email: {$em}</pre>
        <pre>phone number: {$ph}</pre>
    _HTML_;
?>