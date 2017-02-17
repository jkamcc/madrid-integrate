@extends ('layouts.master')

@section ('content')		
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">@lang('data.new_student')</h1>
	    </div>
	</div>
	<div class="row">
	    <form class="form-horizontal col-lg-10" method="POST" action="/estudiantes">
	    	{{ csrf_field() }}
	    	<div class="panel panel-info">
	  			<div class="panel-heading">@lang('data.user_id_data')</div>
	  			<div class="panel-body">
			        <div class="row col-lg-6">			        				       
				        <div class="form-group">
				            <label class="control-label col-md-3" for="ID">@lang('data.ID'):</label>
				            <div class="col-md-7">
				                <input name="id" type="text" class="form-control" id="id">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-3" for="nombre">@lang('data.nombre'):</label>
				            <div class="col-md-7">
				                <input type="text" class="form-control" id="nombre">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-3" for="pwd">@lang('data.apellido1'):</label>
				            <div class="col-md-7">
				                <input type="text" name="apellido1" class="form-control" id="apellido1">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-3" for="apellido2">@lang('data.apellido2'):</label>
				            <div class="col-md-7">
				                <input type="text" name="apellido2" class="form-control" id="apellido2">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-3" for="fecha_nacimiento">@lang('data.fecha_nacimiento'):</label>
				            <div class="col-md-7">
				                <input type="text" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-3" for="lugar_nacimiento">@lang('data.lugar_nacimiento'):</label>
				            <div class="col-md-7">
				                <input type="text" name="lugar_nacimiento" class="form-control" id="lugar_nacimiento">
				            </div>
				        </div>
			        </div>			        
			        <div class="row col-lg-6">
				        <div class="form-group">
				            <label class="control-label col-md-3" for="estado_civil">@lang('data.estado_civil'):</label>
				            <div class="col-md-7">
				                <select name="estado_civil" class="form-control">
									<option selected>@lang('data.seleccionar')</option>
									<option value="soltero">@lang('data.soltero')</option>
									<option value="casado">@lang('data.casado')</option>
									<option value="separado">@lang('data.separado')</option>
									<option value="divorciado">@lang('data.divorciado')</option>
									<option value="viudo">@lang('data.viudo')</option>
								</select>			                
				            </div>
				        </div>
				        <div class="form-group">	
							<div class="col-md-3"><label class="control-label">@lang('data.sexo')</label></div>
							<div class="col-md-7">
								<label class="radio-inline control-label">
								    <input type="radio" name="sexo" value="M" class="">@lang('data.masculino')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="sexo" value="F" class="">@lang('data.femenino')
								</label>													
							</div>					
						</div>
						<div class="form-group">
				            <label class="control-label col-md-3" for="nacionalidad">@lang('data.nacionalidad'):</label>
				            <div class="col-md-7">
				                <select name="nacionalidad" class="form-control">
									<option selected>@lang('data.seleccionar')</option>
									@foreach ($countries as $country)
										<option value="{{ $country->name }}">{{ $country->value }}</option>
									@endforeach
								</select>			                
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-3" for="nivel_instruccion">@lang('data.nivel_instruccion'):</label>
				            <div class="col-md-7">
				                <input type="text" name="nivel_instruccion" class="form-control" id="nivel_instruccion">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-3" for="ocupacion">@lang('data.ocupacion'):</label>
				            <div class="col-md-7">
				                <input type="text" name="ocupacion" class="form-control" id="ocupacion">
				            </div>
				        </div>
			        </div>
	  			</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<div class="row col-lg-6">
						<div class="form-group">	
							<div class="col-md-3"><label class="control-label">@lang('data.documento')</label></div>
							<div class="col-md-7">
								<label class="radio-inline control-label">
								    <input type="radio" name="tipo_documentacion" class="">@lang('data.dni')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="tipo_documentacion" class="">@lang('data.nie')
								</label>													
							</div>					
						</div>									
						<div class="form-group">	
							<div class="col-md-3"><label class="control-label">Prestación</label></div>
							<div class="col-md-7">
								<label class="radio-inline control-label">
								    <input type="radio" name="tipo_documentacion" class="">Si
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="tipo_documentacion" class="">No
								</label>													
							</div>					
						</div>
						<div class="form-group">
				            <label class="control-label col-md-3" for="tipo_prestacion">@lang('data.tipo_prestacion'):</label>
				            <div class="col-md-7">
				                <input type="text" name="tipo_prestacion" class="form-control" id="tipo_prestacion">
				            </div>
				        </div>							
					</div>
					<div class="row col-lg-6">
						
					</div>
				</div>
			</div>
	        <div class="form-group">
	            <div class="col-md-offset-2 col-md-7">
	                <div class="checkbox">
	                    <label>
	                        <input type="checkbox"> Remember me</label>
	                </div>
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-md-offset-2 col-md-7">
	                <button type="submit" class="btn btn-primary">Guardar</button>
	            </div>
	        </div>
	    </form>
	</div>
@endsection