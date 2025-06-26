@extends('layouts.app')

@section('title', 'Редактировать пользователя')

@section('content')
	<main class="create-from-page">
		<div class="create-form-container">
			<h1 class="create-form-title">Редактировать пользователя</h1>
			@include('users._form', ['users' => $user ?? null])
		</div>
	</main>
@endsection