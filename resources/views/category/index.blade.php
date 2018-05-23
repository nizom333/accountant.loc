@extends('category.app')

@section('content')

@component('component.breadcrumbs')
    @slot('title') Главная @endslot
    @slot('main')  @endslot
    @slot('active')  @endslot
@endcomponent



<div class="container-fluid">
    <pre>
    <?print_r($menu['ITEM_TWO'])?>
    </pre>
    <div class="card card-default">
        <div class="card-header">
            <div class="card-actions">
                <a style="float: left!important; font-size: 25px!important;" class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                <h2 style="float: right!important;" class="add-ct-btn"><a href="{{ route('category.create') }}"><button type="button" class="btn waves-effect waves-light btn-rounded btn-success">+ Добавить</button></a></h2>
            </div>
            <h4 class="card-title m-b-0">Product Overview</h4>
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

                        <tr>
                            <td>10-7-2017</td>
                            <td>Приход</td>
                            <td>Заработная плата</td>
                            <td>1200</td>
                            <td>Комментарий</td>
                            <td>
                            <a  href="javascript:void(0)"
                                class="text-inverse p-r-10"
                                data-toggle="tooltip"
                                title=""
                                data-original-title="Edit">

                                    <i class="ti-marker-alt"></i>

                            </a>
                            <a  href="javascript:void(0)"
                                class="text-inverse"
                                title=""
                                data-toggle="tooltip"
                                data-original-title="Delete">

                                    <i class="ti-trash"></i>

                            </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection
