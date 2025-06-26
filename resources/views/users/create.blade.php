@extends('layouts.app')

@section('title', 'Добавить пользователя')

@section('content')
	<main class="create-from-page">
		<div class="create-form-container">
			<h1 class="create-form-title">Добавить пользователя</h1>
			@include('users._form', ['users' => $user ?? null])
		</div>
	</main>
@endsection