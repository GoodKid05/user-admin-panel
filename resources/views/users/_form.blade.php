@php
	$isEdit = isset($user);
@endphp

<form action="{{ $isEdit ? route('users.update', $user->id) : route('users.store') }}" method ="POST" class="form-create-user">
	@csrf
	@if($isEdit) 
		@method('PATCH')
	@endif	
	<div class="form-group">
		<label for="full_name">ФИО</label>
		<input type="text" name="full_name" id="full_name" required value="{{ old('full_name', $isEdit ? $user->full_name : '') }}">
		@error('full_name')
			<div class="text-danger">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" required value="{{ old('email', $isEdit ? $user->email : '') }}">
		@error('email')
			<div class="text-danger">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="date_of_birth">Дата рождения</label>
		<input type="date" name="date_of_birth" id="date_of_birth" required value="{{ old('date_of_birth', $isEdit ? \Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') : '') }}">
		@error('date_of_birth')
			<div class="text-danger">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="phone">Телефон</label>
		<input type="text" name="phone" id="phone" required value="{{ old('phone', $isEdit ? $user->phone : '') }}">
		@error('phone')
			<div class="text-danger">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="login">Логин</label>
		<input type="text" name="login" id="login" required value="{{ old('login', $isEdit ? $user->login : '') }}">
		@error('login')
			<div class="text-danger">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="password">{{ $isEdit ? 'Новый пароль' : 'Пароль' }}</label>
		<input type="password" name="password" id="password" {{ $isEdit ? '' : 'required' }} value="{{ old('password', $isEdit ? $user->passwrod : '') }}">
		@error('password')
			<div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	
	<button type="submit" class="btn-submit-form">Отправить</button>
</form>