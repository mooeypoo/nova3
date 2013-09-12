<script type="text/javascript">
	
	$(document).ready(function()
	{
		$('#searchUserRoutes').quicksearch('#userRoutes .row');
		$('#searchCoreRoutes').quicksearch('#coreRoutes .row');
	});

	$(document).on('click', '.js-route-action', function(e)
	{
		e.preventDefault();
		
		var action = $(this).data('action');
		var id = $(this).data('route');

		if (action == 'delete')
		{
			$('#deleteRoute').modal({
				remote: "{{ URL::to('ajax/delete/route') }}/" + id
			}).modal('show');
		}

		if (action == 'duplicate')
		{
			$('#duplicateRoute').modal({
				remote: "{{ URL::to('ajax/add/duplicate_route') }}/" + id
			}).modal('show');
		}
	});

</script>