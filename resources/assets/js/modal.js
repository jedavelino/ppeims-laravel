// console.log(123);

// console.log($('#delete-equipment-modal'));

$('#confirm-delete-equipment').on('show.bs.modal', function(e) {

	var id = $(e.relatedTarget).data('id');
	var action = $(this).find('form').attr('action');
	var name = $(e.relatedTarget).data('name');

	$(this).find('form').attr('action', action + '/' + id);
	$(this).find('.modal-title').text('Delete ' + name);
	$(this).find('.modal-body').html('<p>Are you sure you want to delete '+ name +'?</p>');
});

$('#confirm-delete-equipment').on('hide.bs.modal', function(e) {
	$(this).find('form').attr('action', '');
	$(this).find('.modal-title').text('');
	$(this).find('.modal-body').children().remove();
});

$('#confirm-delete-department').on('show.bs.modal', function(e) {

	var id = $(e.relatedTarget).data('id');
	var action = $(this).find('form').attr('action');
	var name = $(e.relatedTarget).data('name');

	$(this).find('form').attr('action', action + '/' + id);
	$(this).find('.modal-title').text('Delete ' + name);
	$(this).find('.modal-body').html('<p>Are you sure you want to delete '+ name +'?</p>');
});

$('#confirm-delete-department').on('hide.bs.modal', function(e) {
	$(this).find('form').attr('action', '');
	$(this).find('.modal-title').text('');
	$(this).find('.modal-body').children().remove();
});

// $('#confirm-equipment-delete-modal').on('show.bs.modal', function(e) {

// 	var id = $(e.relatedTarget).data('id');
// 	var $title = $(this).find('.modal-title');
// 	var $body = $(this).find('.modal-body');
// 	var baseUrl = this.baseURI;
// 	var token = $(e.relatedTarget).data('token');

// 	$.get(baseUrl + '/' + id, function(data) {
// 		$title.text('Remove ' + data.name);
// 		$body.html('<p>Are you sure you want to delete '+ data.name +'?</p>')
// 	});

// 	$('.modal-footer').on('click', '.btn-danger', function(e) 
// 	{
// 		$.ajax({
// 			url: baseUrl + '/' + id,
// 			type: 'POST',
// 			async: false,
// 			data: {
// 				_method: 'DELETE',
// 				_token: token,
// 			},
// 			success: function(data) {
// 				// console.log(data);
// 				// location.reload();
// 				$('#messages').html('<p>success</p>');
// 				location.reload();
// 			},
// 			error: function(data) {
// 				console.log('Error: ', data);
// 			}
// 		});
// 	});

// });

// $('#confirm-equipment-delete-modal').on('hide.bs.modal', function(e) {

// 	var $title = $(this).find('.modal-title');
// 	var $body = $(this).find('.modal-body');

// 	$title.text('');
// 	$body.children().remove();

// });