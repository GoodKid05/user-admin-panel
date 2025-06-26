import './bootstrap';

const btnDeleteUsers = document.querySelector('#btnDeleteSelectedUsers');

btnDeleteUsers.addEventListener('click', async function(e) {
	e.preventDefault();
	const checkBoxes = document.querySelectorAll('.user-checkbox:checked');
	if(checkBoxes.length === 0) {
		alert('Выберите хотя бы одного пользователя');
		return;
	}
	
	const deleteRequests = Array.from(checkBoxes).map(cb => {
		const userId = cb.value;

		return fetch(`/admin/users/${userId}`, {
			method: "DELETE"
		})
	});

	Promise.all(deleteRequests)
	.then(() => {
		location.reload();
	}).catch(error => {
		console.error('Ошибка при удалении пользователей', error);
	});
})