@extends ('layouts.master')

@section ('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Estudiantes</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 table-responsive">
			<table id="students-table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>@lang('data.ID')</th>
						<th>@lang('data.nombre')</th>
						<th>@lang('data.apellido1')</th>
						<th>@lang('data.apellido2')</th>
					</tr>
				</thead>
				<tbody>
				@foreach($students as $student)
					<tr>
						<td>{{ $student->id }}</td>
						<td>{{ $student->nombre }}</td>
						<td>{{ $student->apellido1 }}</td>
						<td>{{ $student->apellido2 }}</td>
					</tr>			
				@endforeach
				</tbody>
			</table>			
		</div>		
	</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function() {
		
	});
</script>
@endsection