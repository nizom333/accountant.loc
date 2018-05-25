@extends('layouts.app')

@section('content')


@component('component.breadcrumbs')
    @slot('title') Редактирование записи @endslot
    @slot('main') Список данных @endslot
    @slot('active') Редактирование записи @endslot
@endcomponent

<?//dd($menu['ITEM']);?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Редактирование записи</h4>
                </div>
                <div class="card-body">
                    <form class="form-material m-t-40 row" action="/items/update/<?=$menu['ITEM']->ID?>" method="PATCH">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">

                        <div class="form-group col-md-4 m-t-20">
                            <label class="control-label">Дата</label>
                            <input type="text" name="DATE" class="form-control" placeholder="{{ date('d/m/Y H:m') }}" id="min-date" data-dtp="dtp_OZJ8v">
                        </div>


                        <div class="form-group col-md-4 m-t-20">
                            <label>Категория</label>
                            <select name="CATEGORY_ID" class="form-control">
                            <?foreach($menu['MENU'] as $item){?>
                                <option value="<?=$item['ID']?>"><?=$item['NAME']?></option>
                                <?if(!empty($item['CHILD'])){?>
                                    <?foreach($item['CHILD'] as $child){?>
                                        <?if($child['ID'] == $menu['ITEM']->CATEGORY_ID){?>
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
                            <input type="number" value="<?=$menu['ITEM']->PRICE?>" style="line-height: 55px; overflow-y: hidden;" name="PRICE" class="form-control form-control-line" placeholder="Сумма">
                        </div>

                        <div class="form-group col-md-12 m-t-20">
                            <label>Комментарий</label>
                            <textarea class="form-control" name="COMMENTS" rows="5"><?=$menu['ITEM']->COMMENTS?></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Сохранить</button>
                            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-inverse">Отмена</button></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
