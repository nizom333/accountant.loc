@extends('admin.app_admin')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card card-outline-info">
			<div class="card-header">
				<h4 class="m-b-0 text-white">Other Sample form</h4>
			</div>
			<div class="card-body">
				<h4 class="card-title">Добавление записи</h4>
				<form class="form-material m-t-40" action="{{ route('admin.category.store') }}" method="post">
					{{ csrf_field() }}
					@include('admin.categories.form')
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

