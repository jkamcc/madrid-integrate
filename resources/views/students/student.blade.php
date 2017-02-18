@extends ('layouts.master')

@section ('content')		
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">@lang('data.new_student')</h1>
	    </div>
	</div>
	<div class="row">
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	    <form @submit.prevent="validateBeforeSubmit" id="create-student" class="form-horizontal col-lg-10" method="POST" action="/estudiantes">
	    	{{ csrf_field() }}
	    	<div class="panel panel-info">
	  			<div class="panel-heading">@lang('data.user_id_data')</div>
	  			<div class="panel-body">
			        <div class="row col-lg-6">			        				       
				        <div class="form-group" :class="{'has-error': errors.has('id') }">
				            <label class="control-label col-md-4" for="ID">@lang('data.ID'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_num|min:9|max:9'" dava-vv-as="@lang('data.ID')" name="id" type="text" class="form-control" id="id" maxlength="9" value="{{ old('id') }}">
				                <p v-if="errors.has('id')" class="text-danger">@{{ errors.first('id') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('nombre')}">
				            <label class="control-label col-md-4" for="nombre">@lang('data.nombre'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_spaces|max:35'" type="text" name="nombre" class="form-control" id="nombre" maxlength="35">
				                <p v-if="errors.has('nombre')" class="text-danger">@{{ errors.first('nombre') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('apellido1')}">
				            <label class="control-label col-md-4" for="pwd">@lang('data.apellido1'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_spaces|max:18'" type="text" name="apellido1" class="form-control" id="apellido1" maxlength="18">
				                <p v-if="errors.has('apellido1')" class="text-danger">@{{ errors.first('apellido1') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('apellido2')}">
				            <label class="control-label col-md-4" for="apellido2">@lang('data.apellido2'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_spaces|max:18'" type="text" name="apellido2" class="form-control" id="apellido2" maxlength="18">
				                <p v-if="errors.has('apellido2')" class="text-danger">@{{ errors.first('apellido2') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('fecha_nacimiento')}">
				            <label class="control-label col-md-4" for="fecha_nacimiento">@lang('data.fecha_nacimiento'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|date_format:DD/MM/YYYY'" type="text" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="DD/MM/YYYY" maxlength="18">
				                <p v-if="errors.has('fecha_nacimiento')" class="text-danger">@{{ errors.first('fecha_nacimiento') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('lugar_nacimiento')}">
				            <label class="control-label col-md-4" for="lugar_nacimiento">@lang('data.lugar_nacimiento'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|max:35'" type="text" name="lugar_nacimiento" class="form-control" id="lugar_nacimiento" maxlength="35">
				                <p v-if="errors.has('lugar_nacimiento')" class="text-danger">@{{ errors.first('lugar_nacimiento') }}</p>
				            </div>
				        </div>
			        </div>			        
			        <div class="row col-lg-6">
				        <div class="form-group">
				            <label class="control-label col-md-4" for="estado_civil">@lang('data.estado_civil'):</label>
				            <div class="col-md-8">
				                <select v-validate="'required'" name="estado_civil" class="form-control">
									<option selected>@lang('data.seleccionar')</option>
									<option value="soltero">@lang('data.soltero')</option>
									<option value="casado">@lang('data.casado')</option>
									<option value="separado">@lang('data.separado')</option>
									<option value="divorciado">@lang('data.divorciado')</option>
									<option value="viudo">@lang('data.viudo')</option>
								</select>
								<p v-if="errors.has('lugar_nacimiento')" class="text-danger">@{{ errors.first('estado_civil') }}</p>                
				            </div>
				        </div>
				        <div class="form-group">	
							<label class="control-label col-md-4">@lang('data.sexo')</label>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input type="radio" name="sexo" value="M" class="">@lang('data.masculino')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="sexo" value="F" class="">@lang('data.femenino')
								</label>													
							</div>					
						</div>
						<div class="form-group">
				            <label class="control-label col-md-4" for="nacionalidad">@lang('data.nacionalidad'):</label>
				            <div class="col-md-8">
				                <select name="nacionalidad" class="form-control">
									<option selected>@lang('data.seleccionar')</option>
									@foreach ($countries as $country)
										<option value="{{ $country->name }}">{{ $country->value }}</option>
									@endforeach
								</select>			                
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-4" for="nivel_instruccion">@lang('data.nivel_instruccion'):</label>
				            <div class="col-md-8">
				                <input type="text" name="nivel_instruccion" class="form-control" id="nivel_instruccion">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-4" for="ocupacion">@lang('data.ocupacion'):</label>
				            <div class="col-md-8">
				                <input type="text" name="ocupacion" class="form-control" id="ocupacion">
				            </div>
				        </div>
			        </div>
	  			</div>
			</div>
			<div class="panel panel-info col-lg-5">
				<div class="panel-heading row">@lang('data.datos_prestaciones')</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group">	
							<div class="col-md-4"><label class="control-label">@lang('data.documento')</label></div>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input type="radio" name="tipo_documentacion" class="" value="DNI">@lang('data.dni')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="tipo_documentacion" class="" value="NIE">@lang('data.nie')
								</label>													
							</div>					
						</div>									
						<div class="form-group">	
							<label class="control-label col-md-4">@lang('data.prestacion')</label>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input type="radio" name="prestacion" class="" value="true">@lang('data.yes')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="prestacion" class="" value="false">@lang('data.no')
								</label>													
							</div>					
						</div>
						<div class="form-group">
				            <label class="control-label col-md-4" for="tipo_prestacion">@lang('data.tipo_prestacion'):</label>
				            <div class="col-md-8">
				                <input type="text" name="tipo_prestacion" class="form-control" id="tipo_prestacion">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-4" for="tiempo_parado">@lang('data.tiempo_parado'):</label>
				            <div class="col-md-8">
				                <input type="text" name="tiempo_parado" class="form-control" id="tiempo_parado">
				            </div>
				        </div>							
					</div>					
				</div>
			</div>
			<div class="panel panel-info col-lg-6 col-lg-offset-1">
				<div class="panel-heading row">@lang('data.datos_empadronamiento')</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group">	
							<label class="control-label col-md-4">@lang('data.empadronamiento')</label>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input type="radio" name="empadronamiento" class="" value="true">@lang('data.yes')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="empadronamiento" class="" value="false">@lang('data.no')
								</label>													
							</div>					
						</div>
						<div class="form-group">
				            <label class="control-label col-md-4" for="ID">@lang('data.lugar_empadronamiento'):</label>
				            <div class="col-md-8">
				                <input name="lugar_empadronamiento" type="text" class="form-control" id="id">
				            </div>
				        </div>
				        <div class="form-group">
				            <label class="control-label col-md-4" for="ID">@lang('data.tiempo_empadronamiento'):</label>
				            <div class="col-md-8">
				                <input name="tiempo_empadronamiento" type="text" class="form-control" id="id">
				            </div>
				        </div>
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