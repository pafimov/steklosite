<?php
    $chtoto =Yii::$app->request->getCsrfToken();
    print <<<_HTML_
        <form method="POST" action="/?r=site/admin">
            <input type="hidden" name="_csrf" value="{$chtoto}" />
            <input type="text" class="form-control" name="login"/>
            <input type="password" class="form-control mt-2" name="password"/>
            <input type="submit" class="btn btn-primary mt-2" name="auth" value="Войти"/>
        </form>
    _HTML_;
?>