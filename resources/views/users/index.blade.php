<!DOCTYPE html>
<html>
	<head>
		<title>Админ панель</title>
	</head>
	<body>
		<main>
			<h1>Пользователи</h1>
			<ul>
				@foreach ($users as $user)
					<li>{{ "{$user->id}  {$user->full_name} ({$user->email})" }}</li>
				@endforeach
			</ul>
		</main>
	</body>
</html>