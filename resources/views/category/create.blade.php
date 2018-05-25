@extends('layouts.app')

@section('content')


@component('component.breadcrumbs')
    @slot('title') Добавление категории @endslot
    @slot('main') Настройки категории @endslot
    @slot('active') Добавление категории @endslot
@endcomponent


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Добавление категории</h4>
                </div>
                <div class="card-body">
                    <form class="form-material m-t-40 row" action="{{ route('category.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group col-md-4 m-t-20">
                        <input type="text" style="line-height: 55px; overflow-y: hidden;" name="title" class="form-control form-control-line" placeholder="Название">
                    </div>
                    <div class="form-group col-md-4 m-t-20">
                        <label>Категория</label>
                        <select name="parent_id" class="form-control">
                        <?foreach($menu['MENU'] as $item){?>
                            <option value="<?=$item['ID']?>"><?=$item['NAME']?></option>
                        <?}?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 m-t-20">
                        <input type="text" style="line-height: 55px; overflow-y: hidden;" name="class" class="form-control form-control-line" placeholder="Класс иконки">
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
