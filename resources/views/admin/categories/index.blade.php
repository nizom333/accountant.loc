@extends('admin.app_admin')

@section('content')




<div class="card card-default">
	<div class="card-header">
		<div class="card-actions">
			<a style="float: left!important; font-size: 25px!important;" class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
			<h2 style="float: right!important;" class="add-ct-btn"><a href="{{ route('admin.category.create') }}"><button type="button" class="btn waves-effect waves-light btn-rounded btn-success">+ Добавить</button></a></h2>
		</div>
		<h4 class="card-title m-b-0">Product Overview</h4>
	</div>
	<div class="card-body collapse show">
		<div class="table-responsive">
			<table class="table product-overview">
				<thead>
					<tr>
						<th>Наименование</th>
						<th>Фото</th>
						<th>Категория</th>
						<th>Дата</th>
						<th>Сумма</th>
					</tr>
				</thead>
				<tbody>
				@forelse($categories as $category)
					<tr>
						<td><a href="{{ route('admin.category.edit', ['id'=>$category->id]) }}">{{ $category->name }}</a></td>
						<td>
							<img src="../assets/images/gallery/chair.jpg" alt="iMac" width="80">
						</td>
						<td>20</td>
						<td>10-7-2017</td>
						<td>
							<span class="label label-success font-weight-100">{{ $category->published }}</span>
						</td>
						<td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>
					</tr>
					@empty	
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection