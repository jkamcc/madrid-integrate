@extends ('layouts.master')

@section ('content')		
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">@lang('data.nuevo_estudiante')</h1>
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
	    <form @submit.prevent="validateBeforeSubmit" id="student-fm" class="form-horizontal col-lg-10" method="POST" action="/estudiantes">
	    	@include('students.form')
			
	    </form>
	</div>	
@endsection

@section ('scripts')
	@include('students.form_script')
@endsection