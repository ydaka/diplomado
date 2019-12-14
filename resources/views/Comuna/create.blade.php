@extends('layouts.app')

@section('title', 'Creación de Comuna')

@section('title2', 'Nueva Comuna')

@section('content')

	<div class="row" >
	<div class="col-sm">
		{{--@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif--}}
		<div class="card" style="margin-top: 10px;">
			<div class="card-body">
				<form method="POST" action="/comuna" accept-charset="UTF-8" style="display:inline">
					@csrf			
					<div class="form-group">
						<label for="comuna">Comuna</label>
						<input type="text" class="form-control" name="comu_nomb" id="comu_nomb" value ={{old('comu_nomb')}}>
						{!!$errors->first('comu_nomb','<small class="form-text text-muted"> <div class="alert alert-danger" role="alert">:message </div> </small>')!!}
					</div>
					<div class="form-group">
						<label for="municipio">Municipio</label>
						<select name='muni_codi' class = 'form-control'>
							<option value="">Seleccione uno ... </option>
							@foreach($municipios as $municipio)
								<option 
								value = '{{ $municipio->muni_codi }}' {{(old('muni_codi') == $municipio->muni_codi) ? 'selected':''}}> {{ $municipio->muni_nomb }} 
							</option>
							@endforeach
						</select>
						{!!$errors->first('muni_codi','<small class="form-text text-muted"> <div class="alert alert-danger" role="alert">:message </div> </small>')!!}
					</div>
					<button type="submit" class="btn btn-primary btn-xs fa fa-save" style="margin-left: 10px"> Grabar </button>				
				</form>
				<a href="/comuna" class="btn btn-danger btn-xs fa fa-arrow-alt-circle-right" style="margin-left: 10px"> Cancelar </a>				
			</div>
		</div>
		</div>
	</div>
@endsection


