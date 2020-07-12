<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    if($success){
        $form = ActiveForm::begin();
            print <<<_HTML_
                <p>Пост опубликован</p></br>
            _HTML_;
            print $form->field($model, 'text')->textInput();
            print $form->field($model, 'image')->fileInput();
            print Html::submitButton('Опубликовать', ['class' => 'btn btn-primary']);
        $form::end();
    }else{
        $form = ActiveForm::begin();
            print <<<_HTML_
                <p>Пост</p></br>
            _HTML_;
            if(isset($sp)){
                //var_dump($sp);
            }
            print $form->field($model, 'text')->textInput();
            print $form->field($model, 'image')->fileInput();
            print '<div class="form-group">';
            print Html::submitButton('Опубликовать', ['class' => 'btn btn-primary']);
            print '</div>';
        $form::end();
    }
?>