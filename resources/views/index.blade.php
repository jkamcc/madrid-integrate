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
					<h4>Actividades y Talleres</h4>
				</div>
				<div class="panel-body">
					<ul class="timeline">
						<li>
							<div class="timeline-badge"><i class="fa fa-check"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading"><h4 class="timeline-heading">Emprendimiento</h4></div>
								<div class="timeline-body"><p>Durante los meses de Marzo, Abril y Mayo.</p></div>
							</div>
						</li>
						<li class="timeline-inverted">
							<div class="timeline-badge warning">
								<i class="fa fa-credit-card"></i>
							</div>
							<div class="timeline-panel">
                                <div class="timeline-heading"><h4 class="timeline-title">Búsqueda activa de empleo</h4>
                                </div>
                                <div class="timeline-body"><p>Durante los meses de Junio, Julio y Agosto</p></div>
                            </div>
						</li>
						<li>
							<div class="timeline-badge info"><i class="fa fa-save"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading"><h4 class="timeline-heading">Formación en las TICS</h4></div>
								<div class="timeline-body"><p>Durante los meses de Septiembre, Octubre y Noviembre.</p></div>
							</div>
						</li>
					</ul>
				</div>				
			</div>
		</div>
	</div>
	
@endsection