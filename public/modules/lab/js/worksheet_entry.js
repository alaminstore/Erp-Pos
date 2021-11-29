$(document).on('change', 'select[name="requisition_id"]', function (e) {
	var requisition_id = $(this).val();
	var requisitionInfoTableDOM = $('.requisition_info_table');
	requisitionInfoTableDOM.empty();
	if (requisition_id) {
		getRequisitionDataForWorkSheetEntry(requisition_id);
		getWorkSheetDataForUpdate(requisition_id);
	}
});

function getRequisitionDataForWorkSheetEntry(requisition_id) {
	$.ajax({
		'type': 'GET',
		'url': '/get-requisition-data-for-work-sheet-entry',
		'data': {'requisition_id': requisition_id}
	}).done(function (response) {
		if (response.status === 'success') {
			$('.requisition_info_table').append(response.html);
		}
	}).fail(function (response) {
		console.log("Something went wrong!");
	});
}

function getWorkSheetDataForUpdate(requisition_id) {
	$.ajax({
		'type': 'GET',
		'url': '/get-work-sheet-data',
		'data': {'requisition_id': requisition_id}
	}).done(function (response) {
		let text_area_array = getAllTextAreaArray();
		setWorkSheetData(response.fabric_test_work_sheet, text_area_array);
		setWorkSheetData(response.yarn_test_work_sheet, text_area_array);
	}).fail(function (response) {
		console.log("Something went wrong!");
	});
}

function getAllTextAreaArray() {
	let textAreaElements = $('textarea');
	let domElementsNameArray = [];
	if (Object.keys(textAreaElements).length > 0) {
		$.each(textAreaElements, function (index, html) {
			let name = html.getAttribute('name');
			domElementsNameArray.push(name);
		});
	}
	return domElementsNameArray;
}

function setWorkSheetData(work_sheet_data, text_area_array) {
	if (Object.keys(work_sheet_data).length > 0) {
		$.each(work_sheet_data, function (index, val) {
			if (val !== null && typeof val === 'object') {
				let jsonInputName = index;
				$.each(val, function (jsonIndex, jsonValue) {
					let nameField = jsonInputName + '[\"' + jsonIndex + '\"]';
					if (text_area_array.includes(nameField)) {
						$('textarea[name=\'' + jsonInputName + '[\"' + jsonIndex + '\"]\']').val(jsonValue);
					} else {
						$('input[name=\'' + jsonInputName + '[\"' + jsonIndex + '\"]\']').val(jsonValue);
					}
				});
			} else {
				$('input[name="' + index + '"]').val(val);
			}
		});
	}
}

$(document).on('change', 'select[name="test_property"]', function (e) {
	var conditioning_area_dom = $('#conditioning_area');
	var physical_area_dom = $('#physical_area');
	var others_dom = $('#others');
	var yarn_dom = $('#yarn');
	var test_property = $(this).val();
	let requisition_id = $("select[name='requisition_id']").val();
	if (test_property) {
		switch (test_property) {
			case 'conditioning_area':
				conditioning_area_dom.removeClass('hide');
				physical_area_dom.addClass('hide');
				others_dom.addClass('hide');
				yarn_dom.addClass('hide');
				break;
			case 'physical_area':
				conditioning_area_dom.addClass('hide');
				physical_area_dom.removeClass('hide');
				others_dom.addClass('hide');
				yarn_dom.addClass('hide');
				break;
			case 'others':
				conditioning_area_dom.addClass('hide');
				physical_area_dom.addClass('hide');
				others_dom.removeClass('hide');
				yarn_dom.addClass('hide');
				break;
			case 'yarn':
				conditioning_area_dom.addClass('hide');
				physical_area_dom.addClass('hide');
				others_dom.addClass('hide');
				yarn_dom.removeClass('hide');
				break;
			case 'all':
				conditioning_area_dom.removeClass('hide');
				physical_area_dom.removeClass('hide');
				others_dom.removeClass('hide');
				yarn_dom.removeClass('hide');
		}
	} else {
		console.log('s');
		conditioning_area_dom.addClass('hide');
		physical_area_dom.addClass('hide');
		others_dom.addClass('hide');
		yarn_dom.addClass('hide');
	}
});

var flashMessageDom = $('.flash-message');

$(document).on('submit', '#work_sheet_entry_form', function (e) {
	e.preventDefault();
	flashMessageDom.html('');
	var form = $(this);
	var url = form.attr('action');
	
	$('.text-danger').html('');
	$('#loader').show();
	$.ajax({
		type: "POST",
		url: url,
		data: form.serialize()
	}).done(function (response) {
		$('#loader').hide();
		scrollToTop();
		if (response.status == 'success') {
			flashMessageDom.html(response.message);
			flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
			setTimeout(function() {
				goToListPage();
			}, 3000)
		}
		if (response.status == 'danger') {
			flashMessageDom.html(response.message);
			flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
		}
	}).fail(function (response) {
		$('#loader').hide();
		scrollToTop();
		if (response.responseJSON.errors) {
			$.each(response.responseJSON.errors, function (errorIndex, errorValue) {
				let errorDomElement, error_index, errorMessage;
				errorDomElement = '' + errorIndex;
				errorDomIndexArray = errorDomElement.split(".");
				errorDomElement = '.' + errorDomIndexArray[0];
				error_index = errorDomIndexArray[1];
				errorMessage = errorValue[0];
				if (errorDomIndexArray.length == 1) {
					$(errorDomElement).html(errorMessage);
				}
			});
		}
	});
});

function goToListPage() {
	window.location.href = window.location.protocol + "//" + window.location.host + "/work-sheets";
}
// Scroll To Top
function scrollToTop() {
	window.scrollTo({top: 0, behavior: 'smooth'});
}

document.addEventListener("DOMContentLoaded", () => {
	var requisition_id = $('select[name="requisition_id"]').val();
	if (requisition_id) {
		let requisitionInfoTableDOM = $('.requisition_info_table');
		requisitionInfoTableDOM.empty();
		getRequisitionDataForWorkSheetEntry(requisition_id);
		getWorkSheetDataForUpdate(requisition_id);
	}
});