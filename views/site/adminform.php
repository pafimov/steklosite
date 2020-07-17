<?php
    $chtoto =Yii::$app->request->getCsrfToken();

    print '<input type="hidden" name="_csrf" value="{$chtoto}" />';
?>