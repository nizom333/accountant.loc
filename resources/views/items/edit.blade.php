@extends('layouts.app')

@section('content')


@component('component.breadcrumbs')
    @slot('title') Редактирование записи @endslot
    @slot('main') Список данных @endslot
    @slot('active') Редактирование записи @endslot
@endcomponent


<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Редактирование записи</h4>
                </div>
                <div class="card-body">
                    <form class="form-material m-t-40 row" action="" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                     @include('items.detail_form_filds')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
