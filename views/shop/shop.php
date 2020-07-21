<!-- <div class="container"> -->
<?php
    use yii\helpers\Html;
    //use yii\bootstrap;
    $chtoto =Yii::$app->request->getCsrfToken();
    print <<<_HTML_
        <form method="POST" action="/?r=shop" class="form-inline mb-4">
            <input type="hidden" name="_csrf" value="{$chtoto}"/>
            <input class="form-control mr-sm-2" type="search" name="name" placeholder="Название" aria-label="Название">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    _HTML_;
    //print '<div class="card-group mt-4">';
    print '<div class="row no-gutter">';
    //$sch = 1;
    foreach($data as $thing){
        print <<<_HTML_
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card shadow">
          <div class="inner">
          <img src="{$thing['imagepath']}" class="card-img-top img-fluid" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">{$thing['name']}</h5>
            <p class="card-text"><small class="text-muted">{$thing['have']}</small></p>
            <p class="card-text">{$thing['price']} руб.</p>
          </div>
          <div class="card-footer">
            <form class="form-inline" method="POST" action="/?r=shop">
                <input type="hidden" name="_csrf" value="{$chtoto}" />
                <input class="form-control col-3" type="number" value="1" name="count"/>
                <button class=" btn btnch btn1 ml-1 col-8 col-sm-6 col-md-7 col-lg-7" name="addtocart" value="{$thing['id']}">В корзину</button>
            </form>
          </div>
          
        </div>
        </div>
        _HTML_;
    }
    //print '</div>';
    print '</div>';
?>
<!-- </div> -->