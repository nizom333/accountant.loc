@extends('layouts.app')

@section('content')

@component('component.breadcrumbs')
    @slot('title') Список данных @endslot
    @slot('main') Главная @endslot
    @slot('active') Список данных @endslot
@endcomponent

<script>

!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples
    SweetAlert.prototype.init = function() {

    //Parameter
    $('#sa-params').click(function(){
        swal({
            title: "Вы уверен?",
            text: "Вы не сможете восстановить этот мнимый запись!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Удалить",
            cancelButtonText: "Отмена",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                swal("Удаленно!", "ваш запись успешно удаленно.", "success");
            } else {
                swal("Отменена", "Ваш мнимый запись безопасен.", "error");
            }
        });
    });

    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);
</script>



<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <div class="card-actions">
                <a style="float: left!important; font-size: 25px!important;" class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <h2 style="float: right!important;" class="add-ct-btn">
                    <a href="/items/create?category_id=<?=$menu['LINK_ID']?>">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-success">+ Добавить</button>
                    </a>
                </h2>
            </div>
            <h4 class="card-title m-b-0">Список данных</h4>
        </div>

        <div class="card-body collapse show">
            <div class="table-responsive">
                <table class="table product-overview">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Приход / расход</th>
                            <th>Категория</th>
                            <th>Сумма</th>
                            <th>Комментарий</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?foreach($menu['ELEMENTS'] as $ele){?>
                        <tr>
                            <td><?=$ele['DATE']?></td>
                            <td><?=$ele['EXPENSE']?></td>
                            <td><?=$menu['CURRENT']?></td>
                            <td><?=$ele['PRICE']?></td>
                            <td><?=$ele['COMMENTS']?></td>
                            <td>

                            <form action="{{ route('items.destroy', $ele['ID']) }}" method="post">
                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <a  href="{{ route('items.edit', $ele['ID']) }}"
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

    </div>

</div>


@endsection
