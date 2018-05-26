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
        <?foreach($menu['MENU'] as $item){?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="<?=$item['CLASS']?> text-info"></i></h2>
                            <h3 class=""><?=$item['NAME']?></h3>
                            <h6 class="card-subtitle">

                            </h6></div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?=$item['ID']?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <?}?>
    </div>





        <div class="card">
            <div class="card-body bg-inverse" style="background: url(../assets/images/background/user-info.jpg) / cover;">
                <h4 class="text-white card-title">Список </h4>
                <h6 class="card-subtitle text-white m-0 op-5">Checkout employee list here</h6>
            </div>
            <div class="card-body">
                <div class="message-box contact-box">
                    <h2 class="add-ct-btn"><a href="category/items/create?category_id=4"><button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></a></h2>
                    <div class="message-widget contact-widget">
                        <?foreach($menu['LIST'] as $arItem){?>
                            <a href="/category/items/<?=$arItem['ID']?>/edit">
                                <div class="mail-contnet">
                                    <h5><?=$arItem["DATE"]?></h5><span class="mail-desc"><?=$arItem["COMMENTS"]?></span>
                                </div>
                            </a>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>





</div>

@endsection
