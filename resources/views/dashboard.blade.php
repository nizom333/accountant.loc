@extends('layouts.app')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">
            Главная
        </h3>
    </div>
</div>

<div class="container-fluid">

    <div class="card-group">
        <?foreach($menu['MENU'] as $item){
            $price[$item['ID']] = 0;
            ?>

                <?foreach($item['CHILD'] as $child){?>

                    <?if(!empty($menu['ELEMENTS'])){
                        foreach($menu['ELEMENTS'] as $arItem){?>
                        <?if($arItem['CATEGORY_ID'] == $child['ID']){?>
                            <?$price[$item['ID']] = $price[$item['ID']] + $arItem['PRICE']?>
                        <?}?>

                        <?}
                    }?>

                <?}?>



            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="<?=$item['CLASS']?> text-info"></i>  <span><?=number_format($price[$item['ID']], 3, ' ', ' ')?></span></h2>
                            <h3 class=""><?=$item['NAME']?></h3>
                        </div>
                    </div>
                </div>
            </div>
        <?}?>
    </div>





        <div class="card">
            <div class="card-body bg-inverse" style="background: url(../assets/images/background/user-info.jpg) / cover;">
                <h4 class="text-white card-title">Последние добавленные</h4>
            </div>
            <div class="card-body">
                <div class="message-box contact-box">
                    <h2 class="add-ct-btn"><a href="category/items/create?category_id=4"><button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></a></h2>
                    <div class="message-widget contact-widget">
                        <?foreach($menu['ELEMENTS'] as $arItem){?>
                            <a href="/category/items/<?=$arItem['ID']?>/edit?category_id=<?=$arItem['CATEGORY_ID']?>">
                                <div class="mail-contnet">
                                    <h5><?=$arItem["DATE"]?></h5>
                                        <span class="mail-desc">
                                            <?foreach($menu['MENU'] as $arMenu){?>
                                                <?foreach($arMenu['CHILD'] as $child){?>
                                                    <?if($arItem['CATEGORY_ID'] == $child['ID']){?>
                                                        <?=$arMenu['NAME']?> <i class="mdi mdi-arrow-right"></i> <?=$child['NAME']?>
                                                    <?}?>
                                                <?}?>
                                            <?}?>
                                        </span>
                                </div>
                                <span style="color: #455a64;margin-left: 210px;"><?=$arItem['PRICE']?></span>
                            </a>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>





</div>

@endsection
