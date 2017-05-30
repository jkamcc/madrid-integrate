@extends ('layouts.master')

@section ('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">@lang('data.estudiantes')</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 table-responsive">
			<table id="students-table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th></th>	
						<th>@lang('data.ID')</th>
						<th>@lang('data.nombre')</th>
						<th>@lang('data.apellido1')</th>
						<th>@lang('data.apellido2')</th>
						<th>@lang('data.editar')</th>
					</tr>
				</thead>
				<tbody>
				@foreach($estudiantes as $estudiante)
					<tr>
						<td></td>
						<td>{{ $estudiante->id }}</td>
						<td>{{ $estudiante->nombre }}</td>
						<td>{{ $estudiante->apellido1 }}</td>
						<td>{{ $estudiante->apellido2 }}</td>
						<td><a class="btn btn-primary btn-xs" href="/estudiantes/{{ $estudiante->id }}/editar"><span class="glyphicon glyphicon-pencil"></span></a></td>
					</tr>			
				@endforeach
				</tbody>
			</table>			
		</div>		
	</div>
@endsection