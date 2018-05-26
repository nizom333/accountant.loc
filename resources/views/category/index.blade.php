@extends('layouts.app')

@section('content')


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
                    <a href="/settings/params/create?category_id=11">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-success">+ Добавить</button>
                    </a>
                </h2>
            </div>
            <h4 class="card-title m-b-0">Список категории</h4>
        </div>

        <div class="card-body collapse show">
            <div class="table-responsive">
                <table class="table product-overview">
                    <thead>
                        <tr>
                            <th>Название категории</th>
                            <th>Родительский Идентификатор</th>
                            <th>Идентификатор</th>
                            <th>Класс</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?foreach($menu['ELEMENTS'] as $ele){?>
                        <tr>
                            <td><?=$ele->title?></td>
                            <td><?=$ele->id?></td>
                            <td><?=$ele->parent_id?></td>
                            <td><?=$ele->class?></td>
                            <td>


                            <form action="{{ route('category.destroy', $ele->id) }}" method="post">
                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <a  href="{{ route('category.edit', $ele->id) }}"
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
