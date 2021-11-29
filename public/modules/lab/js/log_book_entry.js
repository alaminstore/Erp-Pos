$(document).on('change', 'select[name="requisition_id"]', function (e) {
	var requisition_id = $(this).val();
	if (requisition_id) {
		var requisitionInfoTableDOM = $('.requisition_info_table');
		$.ajax({
			'type': 'GET',
			'url' : '/get-requisition-data-for-log-book-entry',
			'data': { 'requisition_id': requisition_id }
		}).done(function (response) {
			if (response.status === 'success') {
				requisitionInfoTableDOM.empty();
				requisitionInfoTableDOM.append(response.html);
			}
		}).fail(function (response) {
			console.log("Something went wrong!");
		});
	}
});