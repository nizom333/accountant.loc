@extends('layouts.app')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">
            @foreach($menu['MENU'] as $item)

                @if(!empty($item['CHILD']))

                    @foreach($item['CHILD'] as $child)

                        @if($child['ID'] == $menu['LINK_ID'])

                            {{ $child['NAME'] }}

                        @endif

                    @endforeach

                @endif

            @endforeach
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

                                <?if($child['ID'] == $menu['LINK_ID']){?>

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

                            <?if($child['ID'] == $menu['LINK_ID']){?>

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
    <div class="card card-default">
        <div class="card-header">
            <div class="card-actions">
                <a style="float: left!important; font-size: 25px!important;" class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <h2 style="float: right!important;" class="add-ct-btn">
                    <a href="/category/items/create?category_id=<?=$menu['LINK_ID']?>">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-success">+ Добавить</button>
                    </a>
                </h2>
            </div>
            <h4 class="card-title m-b-0">
                <?foreach($menu['MENU'] as $item):?>

                    <?if(!empty($item['CHILD'])):?>

                        <?foreach($item['CHILD'] as $child):?>

                            <?if($child['ID'] == $menu['LINK_ID']){?>
                                <?=$item['NAME']?>
                            <?}?>

                        <?endforeach?>

                    <?endif?>

                <?endforeach?>
            </h4>
        </div>
    <?if(!empty($menu['ELEMENTS'])){?>
        <div class="card-body collapse show">
            <div class="table-responsive">
                <table class="table product-overview">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Категория</th>
                            <th>Сумма</th>
                            <th>Комментарий</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?foreach($menu['ELEMENTS'] as $ele){?>
                        <tr>
                            <td><?=$ele['DATE']?></td>
                            <td><?//=$menu['CURRENT']?></td>
                            <td><?=$ele['PRICE']?></td>
                            <td><?=$ele['COMMENTS']?></td>
                            <td>

                            <form action="{{ route('items.destroy', $ele['ID']) }}" method="post">
                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <a  href="{{ route('items.edit', $ele['ID']) }}?category_id=<?=$menu['LINK_ID']?>"
                                    class="text-inverse p-r-10"
                                    data-toggle="tooltip"
                                    title=""
                                    data-original-title="Изменить">

                                        <i class="ti-marker-alt"></i>

                                </a>
                                <button data-original-title="Удалить" data-toggle="tooltip" id="sa-params" type="submit" style="cursor: pointer;background: none;border: none;">
                                    <i class="ti-trash"></i>
                                </button>
                            </form>

                            </td>
                        </tr>
                    <?}?>
                    </tbody>
                </table>
            </div>
        </div>
    <?}else{?>
        <h4 class="text-center" style="margin-bottom:20px; color:#e41111">Раздел пусто.</h4>
    <?}?>
    </div>

</div>


@endsection
