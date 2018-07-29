@extends('template')

@section('title', 'Login')


@section('content')

	<div class="row mt-3">
		<div class="col-md-4 offset-md-4">

			<form class="mt-5 border border-top-0" role="form" method="POST" action="{{ url('auth/login') }}">

				<div class="p-3 mb-2 text-white border rounded-top" style="background:firebrick">
					LOGIN
				</div>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">


				<div class="form-group pl-2 pr-2">
					<label for="usuario">Usuário:</label>
					<input type="text" class="form-control" name="usuario" id="usuario" autocomplete="off">
				</div>

				<div class="form-group pl-2 pr-2">
					<label for="senha" >Senha:</label>
					<input type="password" class="form-control" name="password" id="senha">
				</div>

				<div class="form-group pl-2 pr-2">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>

			</form>

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> Houve alguns problemas com os dados fornecidos.<br><br>
					<ul class="list-unstyled">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>
@endsection
