@extends ('layouts.master')

@section ('content')
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Madrid Sigue Integrando
			<img class="logo" src="{{{ asset('img/logo_ame.png') }}}" alt=""></h1>						
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Cursos
				</div>
				<div class="panel-body">
					<ul class="timeline">
						<li>
							<div class="timeline-badge"><i class="fa fa-check"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading"><h4 class="timeline-heading">Emprendimiento</h4></div>
								<div class="timeline-body">Durante los meses marzo, abril, mayo los días martes y jueves en horario de 10:00 a 14:00.</div>
							</div>
						</li>
					</ul>
				</div>				
			</div>
		</div>
	</div>
	
@endsection