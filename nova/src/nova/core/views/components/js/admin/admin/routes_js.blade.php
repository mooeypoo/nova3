<script type="text/javascript">
	
	$(document).ready(function(){
		$('#searchUserRoutes').quicksearch('#userRoutes tbody tr');
		$('#searchCoreRoutes').quicksearch('#coreRoutes tbody tr');
	});

	$(document).on('click', '.js-route-action', function(){
		var action = $(this).data('action');
		var id = $(this).data('route');
		alert('foo');

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

		if (action == 'add')
		{
			$('#addRoute').modal({
				remote: "{{ URL::to('ajax/update/route') }}"
			}).modal('show');
		}

		if (action == 'edit')
		{
			$('#editRoute').modal({
				remote: "{{ URL::to('ajax/update/route') }}/" + id
			}).modal('show');
		}

		return false;
	});

</script>