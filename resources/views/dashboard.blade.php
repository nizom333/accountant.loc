@extends('layouts.app')

@section('content')

@component('component.breadcrumbs')
    @slot('title') Главная @endslot
    @slot('main')  @endslot
    @slot('active')  @endslot
@endcomponent



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









<div class="row">

    <div class="col-lg-8 col-xlg-9">

        <div class="card">
            <div class="card-body bg-inverse" style="background: url(../assets/images/background/user-info.jpg) / cover;">
                <h4 class="text-white card-title">Список данных</h4>
                <h6 class="card-subtitle text-white m-0 op-5">Checkout employee list here</h6>
            </div>
            <div class="card-body">
                <div class="message-box contact-box">
                    <h2 class="add-ct-btn"><a href="/items/create"><button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></a></h2>
                    <div class="message-widget contact-widget">
                        <?foreach($menu['LIST'] as $arItem){?>
                            <a href="/items/<?=$arItem['ID']?>/edit">
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


    <div class="col-lg-4 col-xlg-3">

        <div class="card card-inverse card-info">
            <div class="card-body">

                <div class="d-flex">
                    <div class="m-r-20 align-self-center">
                        <h1 class="text-white"><i class="ti-light-bulb"></i></h1></div>
                    <div>
                        <h3 class="card-title">Аналитика цен</h3>
                        <h6 class="card-subtitle">
                        <?foreach($menu['LIST'] as $ele){
                            $price = $ele['DATE'];
                        }?>
                        <?=$price?>
                        </h6> </div>
                </div>

                <div class="row">
                    <div class="col-6 align-self-center">
                        <h2 class="font-light text-white"><sup><small><i class="ti-arrow-up"></i></small></sup>
                            <?$price = 0;
                            foreach($menu['LIST'] as $ele){
                                $price = $ele['PRICE'] + $price;
                            }?>
                            <?=$price?>
                        </h2>
                    </div>
                    <div class="col-6 p-t-10 p-b-20 text-right">
                        <div class="spark-count" style="height:65px"></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Доступное ссылки
                <div class="card-actions">
                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                    <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                    <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                </div>
            </div>
            <div class="card-body collapse show">
                <?foreach($menu['MENU'] as $item){?>
                    <a href="/category/<?=$item['ID']?>"><h5 class="card-title"><?=$item['NAME']?></h5></a>
                    <hr>
                    <?if(!empty($item['CHILD'])){?>
                        <?foreach($item['CHILD'] as $child){?>
                            <a href="/category/<?=$child['ID']?>"><h5 class="card-title"><?=$child['NAME']?></h5></a>
                            <hr>
                        <?}?>
                    <?}?>
                <?}?>
            </div>
        </div>

    </div>



</div>



</div>

@endsection
