// console.log(123);

// console.log($('#delete-equipment-modal'));

$('#delete-equipment-modal').on('shown.bs.modal', function(e) {

	var id = $(e.relatedTarget).data('id');
	var action = this.baseURI + '/' + id;
	var name = $(e.relatedTarget).data('name');

	$(this).find('form').attr('action', action);
	$(this).find('.modal-title').text('Delete ' + name);
	$(this).find('.modal-body').html('<p>Are you sure you want to delete '+ name +'</p>');
});

$('#delete-equipment-modal').on('hidden.bs.modal', function(e) 
{
	var action = this.baseURI + '/' + 0;

	$(this).find('form').attr('action', action);
	$(this).find('.modal-title').text('');
	$(this).find('.modal-body').children().remove();
});