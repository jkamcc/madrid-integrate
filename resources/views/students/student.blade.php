@extends ('layouts.master')

@section ('content')		
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">@lang('data.new_student')</h1>
	    </div>
	</div>
	<div class="row">
		@if (count($errors) > 0)
			<div class="col-lg-10">
			    <div class="alert alert-danger">
			    	<p>@lang('data.error_crear_estudiante')</p>		        
			    </div>
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
	  			<div class="panel-heading">1.&nbsp;@lang('data.user_id_data')</div>
	  			<div class="panel-body">
			        <div class="row col-lg-6">			        				       
				        <div class="form-group" :class="{'has-error': errors.has('id') }">
				            <label class="control-label col-md-4" for="ID">@lang('data.ID'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_num|min:9|max:9'" dava-vv-as="@lang('data.ID')" name="id" type="text" class="form-control" id="id" maxlength="9" @focus.once="hideError" value="{{ old('id') }}">
				                <p v-if="formErrors.id" class="text-danger">{{ $errors->first('id') }}</p>
				                <p v-else-if="errors.has('id')" class="text-danger">@{{ errors.first('id') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('nombre')}">
				            <label class="control-label col-md-4" for="nombre">@lang('data.nombre'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_spaces|max:35'" type="text" name="nombre" class="form-control" id="nombre" maxlength="35" @focus.once="hideError" value="{{ old('nombre') }}">
				                <p v-if="formErrors.nombre" class="text-danger">{{ $errors->first('nombre') }}</p>
				                <p v-else-if="errors.has('nombre')" class="text-danger">@{{ errors.first('nombre') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('apellido1')}">
				            <label class="control-label col-md-4" for="pwd">@lang('data.apellido1'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_spaces|max:18'" type="text" name="apellido1" class="form-control" id="apellido1" maxlength="18" @focus.once="hideError" value="{{ old('apellido1') }}">
				                <p v-if="formErrors.apellido1" class="text-danger">{{ $errors->first('apellido1') }}</p>
				                <p v-else-if="errors.has('apellido1')" class="text-danger">@{{ errors.first('apellido1') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('apellido2')}">
				            <label class="control-label col-md-4" for="apellido2">@lang('data.apellido2'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_spaces|max:18'" type="text" name="apellido2" class="form-control" id="apellido2" maxlength="18" @focus.once="hideError" value="{{ old('apellido2') }}">
				                <p v-if="formErrors.apellido2" class="text-danger">{{ $errors->first('apellido2') }}</p>
				                <p v-else-if="errors.has('apellido2')" class="text-danger">@{{ errors.first('apellido2') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('fecha_nacimiento')}">
				            <label class="control-label col-md-4" for="fecha_nacimiento">@lang('data.fecha_nacimiento'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|date_format:DD/MM/YYYY'" type="text" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="DD/MM/YYYY" maxlength="18" @focus.once="hideError" value="{{ old('fecha_nacimiento') }}">
				                <p v-if="formErrors.fecha_nacimiento" class="text-danger">{{ $errors->first('fecha_nacimiento') }}
				                <p v-else-if="errors.has('fecha_nacimiento')" class="text-danger">@{{ errors.first('fecha_nacimiento') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('lugar_nacimiento')}">
				            <label class="control-label col-md-4" for="lugar_nacimiento">@lang('data.lugar_nacimiento'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|max:35'" type="text" name="lugar_nacimiento" class="form-control" id="lugar_nacimiento" maxlength="35" @focus.once="hideError" value="{{ old('lugar_nacimiento') }}">
				                <p v-if="formErrors.lugar_nacimiento" class="text-danger">{{ $errors->first('lugar_nacimiento') }}
				                <p v-else-if="errors.has('lugar_nacimiento')" class="text-danger">@{{ errors.first('lugar_nacimiento') }}</p>
				            </div>
				        </div>
			        </div>			        
			        <div class="row col-lg-6">
				        <div class="form-group" :class="{'has-error': errors.has('estado_civil')}">
				            <label class="control-label col-md-4" for="estado_civil">@lang('data.estado_civil'):</label>
				            <div class="col-md-8">
				                <select v-validate="'required'" id="estado_civil" name="estado_civil" class="form-control">
									<option value="" selected>@lang('data.seleccionar')</option>
									<option value="soltero" {{ old('estado_civil') == 'soltero'? 'selected' : ''}}>
										@lang('data.soltero')
									</option>
									<option value="casado" {{ old('estado_civil') == 'casado'? 'selected' : ''}}>
										@lang('data.casado')
									</option>
									<option value="separado" {{ old('estado_civil') == 'separado'? 'selected' : ''}}>
										@lang('data.separado')
									</option>
									<option value="divorciado" {{ old('estado_civil') == 'divorciado'? 'selected' : ''}}>
										@lang('data.divorciado')
									</option>
									<option value="viudo" {{ old('estado_civil') == 'viudo'? 'selected' : ''}}>
										@lang('data.viudo')
									</option>
								</select>
								<p v-if="formErrors.lugar_nacimiento" class="text-danger">{{ $errors->first('estado_civil') }}</p>
								<p v-else-if="errors.has('lugar_nacimiento')" class="text-danger">@{{ errors.first('estado_civil') }}</p>                
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('sexo')}">	
							<label class="control-label col-md-4">@lang('data.sexo')</label>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input type="radio" v-validate="'required'" name="sexo" value="{{ Student::getValoresSexo()[0]}}" class="" {{ old('sexo') == Student::getValoresSexo()[0]? 'checked' : ''}}>@lang('data.masculino')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="sexo" value="{{ Student::getValoresSexo()[1]}}" class="" {{ old('sexo') == Student::getValoresSexo()[1]? 'checked' : ''}}>@lang('data.femenino')
								</label>
								<p v-if="formErrors.sexo" class="text-danger">{{ $errors->first('sexo') }}
				                <p v-else-if="errors.has('sexo')" class="text-danger">@{{ errors.first('sexo') }}</p>													
							</div>					
						</div>
						<div class="form-group" :class="{'has-error': errors.has('nacionalidad')}">
				            <label class="control-label col-md-4" for="nacionalidad">@lang('data.nacionalidad'):</label>
				            <div class="col-md-8">
				                <select v-validate="'required'" name="nacionalidad" class="form-control">
									<option value="" selected>@lang('data.seleccionar')</option>
									@foreach ($countries as $country)
										<option {{ old('nacionalidad') == $country->name? 'selected' : ''}} value="{{ $country->name }}">{{ $country->value }}</option>
									@endforeach
								</select>
								<p v-if="formErrors.nacionalidad" class="text-danger">{{ $errors->first('nacionalidad') }}
				                <p v-else-if="errors.has('nacionalidad')" class="text-danger">@{{ errors.first('nacionalidad') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('nivel_instruccion')}">
				            <label class="control-label col-md-4" for="nivel_instruccion">@lang('data.nivel_instruccion'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|max:255'" type="text" name="nivel_instruccion" class="form-control" id="nivel_instruccion" value="{{ old('nivel_instruccion') }}">
				                <p v-if="formErrors.nivel_instruccion" class="text-danger">{{ $errors->first('nivel_instruccion') }}
				                <p v-else-if="errors.has('nivel_instruccion')" class="text-danger">@{{ errors.first('nivel_instruccion') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('ocupacion')}">
				            <label class="control-label col-md-4" for="ocupacion">@lang('data.ocupacion'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|alpha_spaces|max:35'" type="text" name="ocupacion" class="form-control" id="ocupacion" maxlength="35" value="{{ old('ocupacion') }}">
				                <p v-if="formErrors.ocupacion" class="text-danger">{{ $errors->first('ocupacion') }}
				                <p v-else-if="errors.has('ocupacion')" class="text-danger">@{{ errors.first('ocupacion') }}</p>
				            </div>
				        </div>
				        <div class="form-group" :class="{'has-error': errors.has('telefono')}">
				            <label class="control-label col-md-4" for="telefono">@lang('data.telefono'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|digits:9'" type="text" name="telefono" class="form-control" id="telefono" maxlength="9" value="{{ old('telefono') }}">
				                <p v-if="formErrors.telefono" class="text-danger">{{ $errors->first('telefono') }}
				                <p v-else-if="errors.has('telefono')" class="text-danger">@{{ errors.first('telefono') }}</p>
				            </div>
				        </div>
			        </div>
	  			</div>
			</div>
			<div class="panel panel-info col-lg-5">
				<div class="panel-heading row">2.&nbsp;@lang('data.datos_prestaciones')</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group" :class="{'has-error': errors.has('tipo_documentacion')}">	
							<div class="col-md-4"><label class="control-label">@lang('data.tipo_documentacion')</label></div>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input v-validate="'required'" type="radio" name="tipo_documentacion" class="" value="DNI" {{ old('tipo_documentacion') == 'DNI'? 'checked' : ''}}>@lang('data.dni')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="tipo_documentacion" class="" value="NIE" {{ old('tipo_documentacion') == 'NIE'? 'checked' : ''}}>@lang('data.nie')
								</label>
								<p v-if="formErrors.tipo_documentacion" class="text-danger">{{ $errors->first('tipo_documentacion') }}
				                <p v-else-if="errors.has('tipo_documentacion')" class="text-danger">@{{ errors.first('tipo_documentacion') }}</p>
							</div>					
						</div>									
						<div class="form-group" :class="{'has-error': errors.has('prestacion')}">	
							<label class="control-label col-md-4">@lang('data.prestacion')</label>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input v-validate="'required'" type="radio" name="prestacion" class="" value="1"  v-model.number="prestacion">@lang('data.yes')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="prestacion" class="" value="0" v-model.number="prestacion">@lang('data.no')
								</label>
								<p v-if="formErrors.prestacion" class="text-danger">{{ $errors->first('prestacion') }}
				                <p v-else-if="errors.has('prestacion')" class="text-danger">@{{ errors.first('prestacion') }}</p>													
							</div>					
						</div>
						<div class="form-group" v-if="prestacion" :class="{'has-error': errors.has('tipo_prestacion')}">
				            <label class="control-label col-md-4" for="tipo_prestacion">@lang('data.tipo_prestacion'):</label>
				            <div class="col-md-8">
				            	<select v-validate="'required'" id="tipo_prestacion" name="tipo_prestacion" class="form-control">
									<option value="">@lang('data.seleccionar')</option>
									@foreach (Student::getTipoPrestacion() as $tipo_prestacion_key => $tipo_prestacion_value)
										<option value="{{$tipo_prestacion_value}}" {{ old('tipo_prestacion') == $tipo_prestacion_value? 'selected' : ''}}>
											{{ __('data.'.$tipo_prestacion_key) }}
										</option>
									@endforeach
								</select>
				                <p v-if="formErrors.tipo_prestacion" class="text-danger">{{ $errors->first('tipo_prestacion') }}
				                <p v-else-if="errors.has('tipo_prestacion')" class="text-danger">@{{ errors.first('tipo_prestacion') }}</p>	
				            </div>
				        </div>					
					</div>					
				</div>
			</div>
			<div class="panel panel-info col-lg-6 col-lg-offset-1">
				<div class="panel-heading row">3.&nbsp;@lang('data.datos_empadronamiento')</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group" :class="{'has-error': errors.has('empadronamiento')}">	
							<label class="control-label col-md-4">@lang('data.empadronamiento')</label>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input v-validate="'required'" type="radio" name="empadronamiento" v-model.number="empadronamiento" class="" value="1">@lang('data.yes')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="empadronamiento" v-model.number="empadronamiento" class="" value="0">@lang('data.no')
								</label>
								<p v-if="formErrors.empadronamiento" class="text-danger">{{ $errors->first('empadronamiento') }}
				                <p v-else-if="errors.has('empadronamiento')" class="text-danger">@{{ errors.first('empadronamiento') }}</p>														
							</div>					
						</div>
						<div class="form-group" v-if="empadronamiento" :class="{'has-error': errors.has('lugar_empadronamiento')}">
				            <label class="control-label col-md-4" for="ID">@lang('data.lugar_empadronamiento'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required'" name="lugar_empadronamiento" type="text" class="form-control" id="lugar_empadronamiento" value="{{ old('lugar_empadronamiento') }}" maxlength="255">
				                <p v-if="formErrors.lugar_empadronamiento" class="text-danger">{{ $errors->first('lugar_empadronamiento') }}
				            	<p v-else-if="errors.has('lugar_empadronamiento')" class="text-danger">@{{ errors.first('lugar_empadronamiento') }}</p>		
				            </div>				        
				        </div>				      
				        <div class="form-group" v-if="empadronamiento" :class="{'has-error': errors.has('tiempo_empadronamiento_anos') || errors.has('tiempo_empadronamiento_meses')}">
				            <label class="control-label col-md-4" for="ID">@lang('data.tiempo_empadronamiento'):</label>
				            <div class="col-md-8">				                
				                <input class="col-md-3" v-validate="'required|min_value:0'" name="tiempo_empadronamiento_anos" type="number" class="form-control" id="tiempo_empadronamiento_anos" v-model.number="tiempo_empadronamiento_anos" min="0">
				                <label class="col-md-3" for="tiempo_empadronamiento_anos">@lang('data.anos')</label>
				                 <input class="col-md-3" v-validate="'required|between:0,12'" name="tiempo_empadronamiento_meses" v-model.number="tiempo_empadronamiento_meses" type="number" class="form-control" id="tiempo_empadronamiento_meses" min="0" max="12">
				                <label class="col-md-3" for="tiempo_empadronamiento_meses">@lang('data.meses')</label>
				                <input type="hidden" name="tiempo_empadronamiento" :value="tiempo_empadronamiento">
				                <p v-if="formErrors.tiempo_empadronamiento_anos" class="text-danger">{{ $errors->first('tiempo_empadronamiento_anos') }}
				            	<p v-else-if="errors.has('tiempo_empadronamiento_anos')" class="text-danger">@{{ errors.first('tiempo_empadronamiento_anos') }}</p>
				            	<p v-if="formErrors.tiempo_empadronamiento_meses" class="text-danger">{{ $errors->first('tiempo_empadronamiento_meses') }}
				            	<p v-else-if="errors.has('tiempo_empadronamiento_meses')" class="text-danger">@{{ errors.first('tiempo_empadronamiento_meses') }}</p>
				            </div>
				        </div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="panel panel-info col-lg-5">
				<div class="panel-heading row">4.&nbsp;@lang('data.tipo_insercion_laboral')</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group" :class="{'has-error': errors.has('interes_emprendimiento')}">
							<label class="control-label col-md-4">@lang('data.interes_emprendimiento')</label>
							<div class="col-md-8">
								<label class="radio-inline control-label">
								    <input type="radio" v-validate="'required'" name="interes_emprendimiento" class="" value="1" {{ old('interes_emprendimiento') == '1'? 'checked' : ''}}>@lang('data.yes')
								</label>
								<label class="radio-inline control-label">
								    <input type="radio" name="interes_emprendimiento" class="" value="0" {{ old('interes_emprendimiento') == '0'? 'checked' : ''}}>@lang('data.no')
								</label>
								<p v-if="formErrors.empadronamiento" class="text-danger">{{ $errors->first('empadronamiento') }}
				                <p v-else-if="errors.has('empadronamiento')" class="text-danger">@{{ errors.first('empadronamiento') }}</p>
							</div>		
						</div>
					</div>
					<div class="row">
						<div class="form-group" :class="{'has-error': errors.has('tipo_cuenta')}">
				            <label class="control-label col-md-4" for="tipo_cuenta">@lang('data.trabajar_cuenta_ajena_propia'):</label>
				            <div class="col-md-8">
				            	@foreach(Student::getTiposCuenta() as $tipo_cuenta)
					                <label class="radio-inline control-label">
									    <input type="radio" v-validate="'required'" name="tipo_cuenta" class="" value="{{$tipo_cuenta}}" {{ old('tipo_cuenta') == $tipo_cuenta? 'checked' : ''}}>{{ __('data.cuenta_'.$tipo_cuenta) }}
									</label>
				            	@endforeach
								<p v-if="formErrors.tipo_cuenta" class="text-danger">{{ $errors->first('tipo_cuenta') }}
				                <p v-else-if="errors.has('tipo_cuenta')" class="text-danger">@{{ errors.first('trabaja_cuenta') }}</p>
				            </div>
				        </div>
					</div>
				</div>
			</div>	 
			<div class="panel panel-info col-lg-6 col-lg-offset-1">
				<div class="panel-heading row">5.&nbsp;@lang('data.experiencia_laboral')</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group" :class="{'has-error': errors.has('trabajo_desempenado')}">
							<label class="control-label col-md-4" for="ID">@lang('data.trabajo_desempenado'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|max:35'" name="trabajo_desempenado" type="text" class="form-control" id="trabajo_desempenado" value="{{ old('trabajo_desempenado') }}" maxlength="35">
				                <p v-if="formErrors.trabajo_desempenado" class="text-danger">{{ $errors->first('trabajo_desempenado') }}
				            	<p v-else-if="errors.has('trabajo_desempenado')" class="text-danger">@{{ errors.first('trabajo_desempenado') }}</p>		
				            </div>	
			            </div>
					</div>
					<div class="row">
						<div class="form-group" :class="{'has-error': errors.has('trabajo_deseado')}">
							<label class="control-label col-md-4" for="ID">@lang('data.trabajo_deseado'):</label>
				            <div class="col-md-8">
				                <input v-validate="'required|max:35'" name="trabajo_deseado" type="text" class="form-control" id="trabajo_deseado" value="{{ old('trabajo_deseado') }}" maxlength="35">
				                <p v-if="formErrors.trabajo_deseado" class="text-danger">{{ $errors->first('trabajo_deseado') }}
				            	<p v-else-if="errors.has('trabajo_deseado')" class="text-danger">@{{ errors.first('trabajo_deseado') }}</p>		
				            </div>	
			            </div>
					</div>
					<div class="row">						
						<div class="form-group" :class="{'has-error': errors.has('tiempo_parado_anos') || errors.has('tiempo_parado_meses')}">
				            <label class="control-label col-md-4" for="ID">@lang('data.tiempo_parado'):</label>
				            <div class="col-md-8">				                
				                <input class="col-md-3" v-validate="'required|min_value:0'" name="tiempo_parado_anos" type="number" class="form-control" id="tiempo_parado_anos" v-model.number="tiempo_parado_anos" min="0">
				                <label class="col-md-3" for="tiempo_parado_anos">@lang('data.anos')</label>
				                 <input class="col-md-3" v-validate="'required|between:0,12'" name="tiempo_parado_meses" v-model.number="tiempo_parado_meses" type="number" class="form-control" id="tiempo_parado_meses" min="0" max="12">
				                <label class="col-md-3" for="tiempo_parado_meses">@lang('data.meses')</label>
				                <input type="hidden" name="tiempo_parado" :value="tiempo_parado">
				                <p v-if="formErrors.tiempo_parado_anos" class="text-danger">{{ $errors->first('tiempo_parado_anos') }}
				            	<p v-else-if="errors.has('tiempo_parado_anos')" class="text-danger">@{{ errors.first('tiempo_parado_anos') }}</p>
				            	<p v-if="formErrors.tiempo_parado_meses" class="text-danger">{{ $errors->first('tiempo_parado_meses') }}
				            	<p v-else-if="errors.has('tiempo_parado_meses')" class="text-danger">@{{ errors.first('tiempo_parado_meses') }}</p>
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

@section ('scripts')
<script>
	$(document).ready(function() {
		window.app = new Vue({
		    el: 'form#create-student',
		    methods: {
		    	validateBeforeSubmit(e) {    		
		    		this.$validator.validateAll().then(success => {
		                if (! success) {
		                    // handle error
		                    return;
		                }
		                e.currentTarget.submit();
		            });
		    	},
		    	
		    	hideError: function(e) {
					this.formErrors[e.currentTarget.id] = false;
				},
				
				getTiempo: function(anos, meses) {
	    			var texto = '';
	    			if (anos != null && anos > 0) {
	    				texto += anos;
	    				anos == 1 ? texto+= ' año ' : texto+= ' años ';
	    			}
	    			if (meses != null && meses > 0) {
	    				texto += meses;
	    				meses == 1 ? texto+= ' mes' : texto+= ' meses';
	    			}
	    			return texto.trim();
	    		}
		    },
	    	data: {		    	
	    		'formErrors': {
	    			@foreach($errors->keys() as $errorKey)
						"{{ $errorKey }}": true ,
					@endforeach
	    		},

	    		'prestacion': {{ old('prestacion') == null ? 'null' : old('prestacion') }},

	    		'empadronamiento': {{ old('empadronamiento') == null ? 'null' : old('empadronamiento') }},

	    		'tiempo_empadronamiento_anos': {{ old('tiempo_empadronamiento_anos') == null ? 'null' : old('tiempo_empadronamiento_anos') }},
	    		'tiempo_empadronamiento_meses': {{ old('tiempo_empadronamiento_meses') == null ? 'null' : old('tiempo_empadronamiento_meses') }},
	    		
	    		'tiempo_parado_anos': {{ old('tiempo_parado_anos') == null ? 'null' : old('tiempo_parado_anos') }},
	    		'tiempo_parado_meses': {{ old('tiempo_parado_meses') == null ? 'null' : old('tiempo_parado_meses') }}
	    	},
	    	computed: {
	    		tiempo_empadronamiento: function() {
	    			return this.getTiempo(this.tiempo_empadronamiento_anos, this.tiempo_empadronamiento_meses);
	    		},
	    		tiempo_parado: function() {
	    			return this.getTiempo(this.tiempo_parado_anos, this.tiempo_parado_meses);
	    		}		
	    	}
		});
	});
</script>
@endsection