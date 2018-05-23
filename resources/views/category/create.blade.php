@extends('layouts.app')

@section('content')


@component('component.breadcrumbs')
    @slot('title') Главная @endslot
    @slot('main')  @endslot
    @slot('active')  @endslot
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Other Sample form</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Добавление записи</h4>
                    <form class="form-material m-t-40" action="" method="post">
                        @include('category.detail_form_filds')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
