$(document).ready(function(){

	// Date of birthday plugin
	$.dobPicker({
	  	daySelector: '#dobday',
		monthSelector: '#dobmonth',
		yearSelector: '#dobyear'
	});

	// Datepicker
	$("#datepicker").datepicker({
		'dateFormat': 'yy-mm-dd',
		firstDay: 1
	});

	$('#birthdate').datepicker({
		'dateFormat': 'yy-mm-dd',
		firstDay: 1
	});

	// Add new insulin lines
	$('#add-new').unbind('click').click(function(e){
		e.preventDefault();
		add_new_med();
		console.dir(e);
	});

	// Delete insulins
	$('i.remover').unbind('click').click(function(){
		//alert($(this).parent('td').siblings('td.name').data('insulin'));
		delete_insulin($(this).parent('td').siblings('td.name').data('insulin'));
	});

	// Manage the messure field:
	$('input#messure').on('change', function(){
		var $messure_fix = $('<input/>').attr({ type: 'hidden', id: 'messure-fix', name: 'messure', value: 'false'});
		var $fixer = $('#messure-fix');
		if($(this).is(':checked')){
			$fixer.remove();
		}else{
			$messure_fix.appendTo('#fixer-container');
		}
	});

	// Manage the gender field:
	$('input#gender').on('change', function(){
		var $gender_fix = $('<input/>').attr({ type: 'hidden', id: 'gender-fix', name: 'gender', value: 'false'});
		var $fixer = $('#gender-fix');
		if($(this).is(':checked')){
			$fixer.remove();
		}else{
			$gender_fix.appendTo('#fixer-container');
		}
	});

});
var cont = 1;
function add_new_med(){
	var $row = $('<div></div>').addClass('form-group row');
	var $col1 = $('<div></div>').addClass('col-md-3').appendTo($row);
	var $col2 = $('<div></div>').addClass('col-md-6').appendTo($row);
	var $col3 = $('<div></div>').addClass('col-md-3').appendTo($row);
	$row.appendTo($('#med-list'));
	var select = $('#insulin1').clone(); 
	var last = 'insulin'+(++cont); 
	select.attr('id', last); //.attr('name', last);
	$col2.append(select);
}

function delete_insulin(insulin){

	var $promise = ajax('user/', 'delete_insulin', insulin);
	$promise.pipe(function(resp){
		var message = '<div class="alert alert-success">'+resp+'</div>';
		$('td[data-insulin='+insulin+']').parent('tr').fadeOut('normal', function(){
			$(this).remove();
			$('.col-debug').html(message);
		});
	});
	$promise.fail(function(jqXHR, textStatus, errorThrown){
		var message = '<div class="alert alert-danger"><span>'+textStatus+': </span><span>'+errorThrown+'</div>';
		$('.col-debug').html(message);
	});
}