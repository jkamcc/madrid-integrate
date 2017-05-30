<script>
	$(document).ready(function() {
		window.app = new Vue({
		    el: 'form#student-fm',
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

	    		'estudiante': {
	    			'id': '{{ old('id', $estudiante->id) }}'
	    		},

	    		'prestacion': {{ old('prestacion', $estudiante->prestacion) === null ? 'null' : old('prestacion', $estudiante->prestacion) }},

	    		'empadronamiento': {{ old('empadronamiento', $estudiante->empadronamiento) === null ? 'null' : old('empadronamiento', $estudiante->empadronamiento) }},

	    		'tiempo_empadronamiento_anos': {{ old('tiempo_empadronamiento_anos', $estudiante->tiempo_empadronamiento_anos) === null ? 'null' : old('tiempo_empadronamiento_anos', $estudiante->tiempo_empadronamiento_anos) }},
	    		'tiempo_empadronamiento_meses': {{ old('tiempo_empadronamiento_meses', $estudiante->tiempo_empadronamiento_meses) === null ? 'null' : old('tiempo_empadronamiento_meses', $estudiante->tiempo_empadronamiento_meses) }},
	    		
	    		'tiempo_parado_anos': {{ old('tiempo_parado_anos', $estudiante->tiempo_parado_anos) === null ? 'null' : old('tiempo_parado_anos', $estudiante->tiempo_parado_anos) }},
	    		'tiempo_parado_meses': {{ old('tiempo_parado_meses', $estudiante->tiempo_parado_meses) === null ? 'null' : old('tiempo_parado_meses', $estudiante->tiempo_parado_meses) }}
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