@extends('layouts.app')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">
            <?foreach($menu['MENU'] as $item):?>

                <?if(!empty($item['CHILD'])):?>

                    <?foreach($item['CHILD'] as $child){?>

                        <?if($child['ID'] == $_GET['category_id']){?>

                            <?=$child['NAME']?>

                        <?}?>

                    <?}?>

                <?endif?>

            <?endforeach?>
        </h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">

                    <a href="/">Главная</a>

            </li>

            <li class="breadcrumb-item">

                    <?foreach($menu['MENU'] as $item):?>

                        <?if(!empty($item['CHILD'])):?>

                            <?foreach($item['CHILD'] as $child):?>

                                <?if($child['ID'] == $_GET['category_id']){?>

                                    <a href="/category/<?=$child['ID']?>"><?=$item['NAME']?></a>

                                <?}?>

                            <?endforeach?>

                        <?endif?>

                    <?endforeach?>

            </li>

            <li class="breadcrumb-item active">
                <?foreach($menu['MENU'] as $item):?>

                    <?if(!empty($item['CHILD'])):?>

                        <?foreach($item['CHILD'] as $child){?>

                            <?if($child['ID'] == $_GET['category_id']){?>

                                <?=$child['NAME']?>

                            <?}?>

                        <?}?>

                    <?endif?>

                <?endforeach?>
            </li>



        </ol>
    </div>
</div>




<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <a href="/category/<?=$_GET['category_id']?>" class="btn waves-effect waves-light waves-light btn-sm btn-success"><i class="mdi mdi-keyboard-backspace"></i> Назад</a>
                    <h4 style="float: right;" class="m-b-0 text-white">Добавление
                        <?foreach($menu['MENU'] as $item):?>

                            <?if(!empty($item['CHILD'])):?>

                                <?foreach($item['CHILD'] as $child):?>

                                    <?if($child['ID'] == $_GET['category_id']){?>

                                        <?$text = substr($item['NAME'], 0, -2);?>
                                        <?if($text == 'Доход'){?>
                                            <span style="text-transform: lowercase;"><?=$text?>а</span>
                                        <?}else {?>
                                            <span style="text-transform: lowercase;"><?=$text?></span>
                                        <?}?>

                                    <?}?>

                                <?endforeach?>

                            <?endif?>

                        <?endforeach?>
                    </h4>
                </div>
                <div class="card-body">
                    <form class="form-material m-t-40 row" action="{{ route('items.store') }}" method="POST">
                    {{ csrf_field() }}



                    <div class="form-group col-md-4 m-t-20">
                        <label class="control-label">Дата</label>
                        <input type="text" name="DATE" class="form-control" value="{{date('d.m.Y H:i')}}" id="min-date" data-dtp="dtp_OZJ8v">
                    </div>


                    <div class="form-group col-md-4 m-t-20">
                        <label>Категория</label>
                        <select name="CATEGORY_ID" class="form-control">
                        <?foreach($menu['MENU'] as $item){?>
                            <?if(!empty($item['CHILD'])){?>
                                <?foreach($item['CHILD'] as $child){?>
                                    <?if($child['ID'] == $_GET['category_id']){?>
                                        <option selected="<?=$child['ID']?>" value="<?=$child['ID']?>"><?=$child['NAME']?></option>
                                    <?}else{?>
                                        <option value="<?=$child['ID']?>"><?=$child['NAME']?></option>
                                    <?}?>
                                <?}?>
                            <?}?>
                        <?}?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 m-t-20">
                        <input type="number" style="line-height: 55px; overflow-y: hidden;" name="PRICE" class="form-control" placeholder="Сумма">
                    </div>

                    <div class="form-group col-md-12 m-t-20">
                        <label>Комментарий</label>
                        <textarea class="form-control" name="COMMENTS" rows="5"></textarea>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Сохранить</button>
                            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-inverse">Отмена</button></a>
                        </div>

                    </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
