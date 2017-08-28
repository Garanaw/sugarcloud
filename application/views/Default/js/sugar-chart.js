
// Define important vars:
var controller = base_url+'sugar/';
$.sugarData = null;

$(function(){

	// Collapsible and draggable panel
	$("#draggable").draggable();
	$("#form-container").collapse('toggle');

	// Datepicker
	$("#datepicker").datepicker({
		'dateFormat': 'yy-mm-dd',
		firstDay: 1
	});

	// Timepicker
	$("#timepicker").timepicki({
		increase_direction:'up',
		show_meridian:false
	});

	// Submit form via AJAX
	$("#new_sugar_value").submit(function(e){
		var form = $(this);

		e.preventDefault();

		var data = {};
		$.each($(this).serializeArray(), function(i, field){
			// Setup the json object
			data[field.name] = field.value;
		});
		data = JSON.stringify(data);

		// Send the data via AJAX
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			cache: false,
			data: $(this).serializeArray(),
			success: function(data){
				alert(data);
			},
			error: function(request, status, error){
				if(window.console && window.console.log){
					console.log('error posting data: '+request.responseText);
				}else{
					alert('error posting data: '+request.responseText);
				}
			}
		});
	});

	/********************/
	/*					*/
	/*		Charts		*/
	/*					*/
	/********************/

	// Line chart:

	// Date picker:
	$("#line-date-selector").datepicker({'dateFormat': 'yy-mm-dd', firstDay: 1});

	var test = function(date){
		var json = null;
		date = date ||'CURDATE()';
		$.ajax({
			async: false,
			global: false,
			url: controller+'get_day_controls',
			type: 'post',
			dataType: 'json',
			data: 'day='+date, 
			success: function(res){
				json = res[0];
			},
			error: function(xhr, ajaxOptions, thrownError) {
				if(window.console && window.console.log){
					console.log('error: '+this.url+' -> '+xhr.status+': '+thrownError);
				}else{
					alert('error: '+this.url+' -> '+xhr.status+': '+thrownError);
				}
			}
		});
		return json;
	};

	var lineChart = new Morris.Line({
		element: 'chart-line',
		data: test(), 
		xkey: 'time',
		ykeys: ['value'],
		labels: ['Value'],
		parseTime: false,
		hoverCallback: function(index, options, content, row){
			var $alert = '';
			var $return = '';
			if(!!row.time){
				$return += '<div class="morris-hover-row-label">time: '+row.time+'</div>';
			}
			if(!!row.value){
				var floatValue = parseFloat(row.value);
				var style = 'style="color:';
				var color = null;
				if(floatValue < parseFloat(4.4)){
					color = '#0000ff"';
				}else if(floatValue > parseFloat(4.4) && floatValue < parseFloat(7.8)){
					color = '#00ff00"';
				}else if(floatValue <= parseFloat(10.0)){
					color = '#ffcc00"';
				}else if(floatValue > parseFloat(10.0)){
					color = '#ff0000"';
				}else if(floatValue > parseFloat(20.0)){
					color = '#990000"';
				}else if(floatValue > parseFloat(30.0)){
					color = '#4d0000"';
				}
				$return += '<div class="morris-hover-point" '+style+color+'>value: '+row.value+'</div>';
			}
			if(!!row.insulin1 && 'null' != row.insulin1 && !!row.insulin1_units && 0 != parseInt(row.insulin1_units)){
				$return += '<div class="morris-hover-row-label">'+row.insulin1+': '+row.insulin1_units+'</div>';
			}
			if(!!row.insulin2 && 'null' != row.insulin2 && !!row.insulin2_units && 0 != parseInt(row.insulin2_units)){
				$return += '<div class="morris-hover-row-label">'+row.insulin2+': '+row.insulin2_units+'</div>';
			}
			if(!!row.comment){
				$return += '<div class="morris-hover-row-label">comment: '+row.comment+'</div>';
			}
			return $return;
		}
	});

	$("#line-day-update").on('click', function(){
		$date = $('#line-date-selector').prop('value');
		update_char($date, lineChart, 'day');
		get_averages($date);
	});

	$('i#btn-previous-date').on('click', function(){
		if(previous_date()){
			update_char($('#line-date-selector').prop('value'), lineChart, 'day');
			get_averages($('#line-date-selector').prop('value'));
		}
	});

	$('i#btn-next-date').on('click', function(){
		if(next_date()){
			update_char($('#line-date-selector').prop('value'), lineChart, 'day');
			get_averages($('#line-date-selector').prop('value'));
		}
	});

	/********************/
	/*					*/
	/*		Charts		*/
	/*					*/
	/********************/

	// Mg to Mmol
	$('span#see-mmol').on('click', function(){
		if(null === $.sugarData){
			return false;
		}

		$.each($.sugarData, function(k, v){
			if(v.messure == 'mg' || v.messure == 'mg/dl'){
				$.sugarData[k].value = mg_to_mmol(v.value);
				$.sugarData[k].messure = 'mmol/l';
			}
		});
		setData(lineChart, $.sugarData);
		$('span#see-switch').removeClass('fa-long-arrow-right').addClass('fa-long-arrow-left');

		var value = mg_to_mmol(parseFloat($('#day_average strong').text()));
		$('#day_average strong').text(value);

		$('#month_max').html(mg_to_mmol($('#month_max').html()));
		$('#month_min').html(mg_to_mmol($('#month_min').html()));
		$('#month_avg').html(mg_to_mmol($('#month_avg').html()));
		$('#week_max').html(mg_to_mmol($('#week_max').html()));
		$('#week_min').html(mg_to_mmol($('#week_min').html()));
		$('#week_avg').html(mg_to_mmol($('#week_avg').html()));
	});

	// Mmol to Mg
	$('span#see-mg').on('click', function(){
		if(null === $.sugarData){
			return false;
		}
		$.each($.sugarData, function(k, v){
			if(v.messure == 'mmol' || v.messure == 'mmol/l'){
				$.sugarData[k].value = mmol_to_mg(v.value);
				$.sugarData[k].messure = 'mg/dl';
			}
		});
		setData(lineChart, $.sugarData);
		$('span#see-switch').removeClass('fa-long-arrow-left').addClass('fa-long-arrow-right');

		var value = mmol_to_mg(parseFloat($('#day_average strong').text()));
		$('#day_average strong').text(value);

		$('#month_max').html(mmol_to_mg($('#month_max').html()));
		$('#month_min').html(mmol_to_mg($('#month_min').html()));
		$('#month_avg').html(mmol_to_mg($('#month_avg').html()));
		$('#week_max').html(mmol_to_mg($('#week_max').html()));
		$('#week_min').html(mmol_to_mg($('#week_min').html()));
		$('#week_avg').html(mmol_to_mg($('#week_avg').html()));
	});

});

function update_char(date, chart, func){
	date = date || 'CURDATE()';

	var data = '';
	$.sugarData = set_day_data(date);

	setData(chart, $.sugarData);
}

function setData(chart, data){
	chart.setData(data);
	chart.redraw();
}

function get_averages(date){
	var $promise = ajax('sugar', 'get_averages', date);

	$promise.pipe(function(resp){
		console.dir(resp[0]);
		set_averages(resp[0]);
	}).done().fail(function(jqXHR, textStatus, errorThrown){
		alert('fail: '+jqXHR+' '+textStatus+' '+errorThrown);
	});
}

function set_averages(values){
	$('#month_max').html(values.month_max);
	$('#month_min').html(values.month_min);
	$('#month_avg').html(values.month_avg);
	$('#week_max').html(values.week_max);
	$('#week_min').html(values.week_min);
	$('#week_avg').html(values.week_avg);
}

function ajax(cl, fn, data, debug){
	var url = base_url+cl+'/'+fn;
	var df = $.Deferred();
	var json = '';
	debug = debug || false;
	if(debug)
		alert(data);
	return $.ajax({
		type: 'POST',
		url: url,
		cache: false,
		data: 'data='+data,
		success: function(data){
			df.resolve(data);
		},
		error: function(request, status, error){
			alert(request+': ('+status+') '+error);
			console.dir(new Array(request, status, error));
			df.reject(request+': '+error);
		}
	});
}

function set_day_data(date){
	var $modal = $("#modal-updating");
	var $title = $modal.find('h3.modal-title span');
	var $body = $modal.find('div.modal-body');
	var json = null;
	date = date || 'CURDATE()';
	
	$.ajax({
		async: false,
		global: false,
		url: controller+'get_day_controls',
		type: 'post',
		dataType: 'json',
		data: 'day='+date,
		beforeSend: function(){

			$title.empty().append(date);
		},
		success: function(res){
			json = res[0];
			var sum = 0.0;
			var cont = 0;

			$.each(json, function(k, v){
				sum += parseFloat(v.value);
				++cont;
			});

			var average = (sum/cont);
			var color = '#00ff00';
			if(average < 4.5){
				color = '#0000ff';
			}else if(average > 7.5 && average < 10.0){
				color = '#ffcc00';
			}else if(average > 10.0){
				color = '#ff0000';
			}
			var style = 'style="color: '+color+'"';

			$('#day_average').html('(<ins>'+date+'</ins>) <strong '+style+'>'+(sum/cont).toFixed(2)+'</strong>');

			if(window.console && window.console.log){
				console.log('updating json: '+json);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			if(window.console && window.console.log){
				console.log('error: '+this.url+' -> '+xhr.status+': '+thrownError);
			}
			$body.append('error: '+this.url+' -> '+xhr.status+': '+thrownError);
		}
	});
	return json;
}

function previous_date(){
	if(parseDate()){
		var date = parseDate();
		var tmp = date.add({days:-1}).toString('yyyy-MM-dd');
		$('#line-date-selector').val(tmp);
		return true;
	}
	return false;
}

function next_date(){
	if(parseDate()){
		var date = parseDate();
		var tmp = date.add({days:1}).toString('yyyy-MM-dd');
		$('#line-date-selector').val(tmp);
		return true;
	}
	return false;
}

function parseDate(){
	var date = $('#line-date-selector').val();
	if('' == date || null == date){
		return false;
	}
	return Date.parse(date.toString());
}

function mmol_to_mg(mmol){

	if(!isInt(mmol) && !isFloat(mmol)){
		console.log('Error: '+mmol+' must be an Integet or a Float value.');
		return null;
	}

	return (mmol * 18.016).toFixed(2);
}

function mg_to_mmol(mg){

	if(!isInt(mg) && !isFloat(mg)){
		console.log('Error: '+mg+' must be an Integet or a Float value.');
		return null;
	}

	return (mg / 18.016).toFixed(2);
}