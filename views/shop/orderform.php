<?php 
    $chtoto =Yii::$app->request->getCsrfToken();
    print <<<_HTML_
        <form method="POST" action="/?r=shop/cart">
            <input type="hidden" name="_csrf" value="{$chtoto}" />
            <input name="name" type="text" class="form-control" placeholder="Имя">
            <label class="mt-3" for="user_phone">Формат: +7XXXXXXXXXX</label>
            <input name="phone" type="tel" required placeholder="+7 (___) ___-__-__" id="user_phone" class="user-phone form-control" title="Формат: +7XXXXXXXXXX"/>
            <input class="btn btn-primary mt-3" type="submit" name="order" value="Заказать">
        </form>
    _HTML_;
?>