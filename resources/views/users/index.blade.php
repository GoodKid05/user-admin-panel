@extends('layouts.app')

@section('content')
	<main class="users-page">
		<div class="users-container">
			<h1 class="users-title">Пользователи</h1>
			<div class="users-actions">
				<a href="{{ route('users.create') }}" class="btn-action-user">Добавить полльзователя</a>
				<a href="{{ route('users.create') }}" class="btn-action-user">Удалить пользователя</a>
			</div>
			<table class="users-table">
				<thead class="users-table-head">
					<tr>
						<th></th>
						<th>ID</th>
						<th>ФИО</th>
						<th>Дата рождения</th>
						<th>Моб. телефон</th>
						<th>E-mail</th>
						<th>Логин</th>
						<th>Пароль</th>
						<th>Фото</th>
					</tr>
				</thead>
				<tbody class="users-table-body">
					@foreach ($users as $user)
						<tr class="users-table-row">
							<td><input type="checkbox"></td>
							@foreach($user->getAttributes() as $key => $value)
								@if (in_array($key, ['created_at', 'updated_at']))
									@continue
								@endif
								@if(in_array($key, ['date_of_birth']))
									<td class="users-table-cell">{{ \Carbon\Carbon::parse($value)->format('d.m.Y') }}</td>
								@else
									<td class="users-table-cell">{{ $value }}</td>
								@endif
							@endforeach
							<td>
								<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</main>
@endsection