@extends('layouts.app')

@section('content')


@component('component.breadcrumbs')
    @slot('title') Добавление записи @endslot
    @slot('main') Cписок данных @endslot
    @slot('active') Добавление записи @endslot
@endcomponent


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Добавление записи</h4>
                </div>
                <div class="card-body">
                    <form class="form-material m-t-40 row" action="{{ route('items.store') }}" method="POST">
                    {{ csrf_field() }}
                        @include('items.detail_form_filds')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
