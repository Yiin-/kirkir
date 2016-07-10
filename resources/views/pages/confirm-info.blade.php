@extends ('layouts.default')

@section ('title', 'Patvirtinti informaciją')

@section ('content')
<div class="content-block content-block--center">
	<h1 class="sub-heading">
		Patvirtinkite savo informaciją
	</h1>
</div>

<div class="content-block">
	<form action="{{ route('auth.confirm-info') }}" class="form form--medium">
		{!! csrf_field() !!}

		<div class="form-block form-block--centered">
			<label for="name">Jūsų vardas</label>
			<input class="form-field" type="text" name="name" value="{{ $currentData['name'] }}">
		</div>

		<div class="form-block form-block--centered">
			<label for="email">El. paštas</label>
			<input class="form-field" type="email" name="email" value="{{ $currentData['email'] }}">
		</div>

		<div class="form-block form-block--centered">
			<label for="country">Šalis</label>
			<input class="form-field" type="text" name="country" value="Lietuva">
		</div>

		<div class="form-block form-block--centered">
			<label for="city">Miestas</label>
			<input class="form-field" type="dropdown" data-source="cities" name="city" value="">
			<ul class="dropdown-data" id="cities">
				<li>Vilnius</li>
				<li>Kaunas</li>
				<li>Klaipėda</li>
			</ul>
		</div>

		<div class="form-block form-block--centered">
			<label for="password">Slaptažodis</label>
			<input class="form-field" type="password" name="password" value="">
		</div>

		<button class="form-button form-button--big form-button--wide" type="submit">Išsaugoti</button>
	</form>
</div>
@endsection
