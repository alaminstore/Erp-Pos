$(document).on('change', 'select[name="buyer_id"]', function () {
	let buyer_id = $(this).val();
	let styleSelectDom = $('select[name="style_id"]');
	styleSelectDom.empty();
	if (buyer_id) {
		$.ajax({
			'type': 'GET',
			'url': '/fetch-booking-nos',
			'data': {'buyer_id': buyer_id}
		}).done(function (response) {
			let styleDropdown = '<option value="">Select Booking No</option>';
			if (Object.keys(response).length > 0) {
				$.each(response, function (index, val) {
					styleDropdown += '<option value="' + index + '">' + val + '</option>';
				});
				styleSelectDom.html(styleDropdown);
			}
		}).fail(function (response) {
			console.log("Something went wrong!!");
		});
	}
});