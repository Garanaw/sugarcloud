
// Define important vars:
var controller = base_url+'sugar/';
var year = new Date().getFullYear();
var month = new Date().getMonth();
var day = new Date().getDate();

$(document).ready(function() {

	// Datepicker
	$("#datepicker").datepicker({
		'dateFormat': 'yy-mm-dd'
	});

	// Timepicker
	$("#timepicker").timepicki({
		increase_direction:'up',
		show_meridian:false
	});

	var $calendar = $('#calendar').weekCalendar({
		timeslotsPerHour: 3,
		timeslotHeigh: 100,
		scrollToHourMillis : 0,
		timeFormat: 'H:i',
		firstDayOfWeek: 1, //set first day to Monday
		use24Hour: true, // use 24 hours format
		hourLine: true, // mark the current hour
		defaultEventLength: 5,
		data: update_calendar(),
		wrapperClasses: 'my_class',
		height: function($calendar) {
			return $(window).height() - $('h1').outerHeight(true);
		},
		deletable: function(calEvent, $event){
			return false;
		},
		draggable: function(calEvent, $event){
			return false;
		},
		eventRender : function(calEvent, $event) {
			if (calEvent.end.getTime() < new Date().getTime()) {
				$event.css('backgroundColor', '#aaa');
				$event.find('.time').css({'backgroundColor': '#999', 'border':'1px solid #888'});
			}
		},
		eventNew: function(calEvent, $event) {
			//displayMessage('<strong>Added event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
			//alert('You\'ve added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.');
			$modal = $("#modal-new");
			$modal.find('#new_sugar_value').removeClass('collapse');
			$modal.modal('show');
			return;
		},
		eventDrag: function(calEvent, $event){
			return false;
		},
		eventDrop: function(calEvent, $event) {
			//displayMessage('<strong>Moved Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
			return false;
		},
		eventResize: function(calEvent, $event) {
			//displayMessage('<strong>Resized Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
			return false;
		},
		eventClick: function(calEvent, $event) {
			//displayMessage('<strong>Clicked Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
			return false;
		},
		eventMouseover: function(calEvent, $event) {
			var msg = '<span id="eventDate">Date: '+calEvent.start.toString('d-MM-yyyy')+' at '+calEvent.start.toString('HH:mm')+'</span>';
			msg += '<br><span id="value">Value: '+calEvent.title+'</span>';
			if(calEvent.insulin1){
				msg += '<br><span id="insulin1">'+calEvent.insulin1+': '+calEvent.insulin1_units+'</span>';
			}
			if(calEvent.insulin2){
				msg += '<br><span id="insulin2">'+calEvent.insulin2+': '+calEvent.insulin2_units+'</span>';
			}
			if(calEvent.comment){
				msg += '<br><span id="comment">'+calEvent.comment;
			}
			displayMessage(msg);
			//displayMessage('<strong>Mouseover Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
		},
		eventMouseout: function(calEvent, $event) {
			return false;
			//displayMessage('<strong>Mouseout Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
		},
		noEvents: function() {
			displayMessage('There are no events for this week');
		}
	});

	function displayMessage(message) {
		$('#message').html(message).fadeIn();
	}
});

function update_calendar(date = 'CURDATE()'){
	var json = null;
	date = (null === date) ? 'CURDATE()' : date;

	$.ajax({
		async: false,
		global: false,
		url: controller+'get_week_controls',
		type: 'post',
		dataType: 'json',
		data: 'day_of_week=2016-08-13',
		success: function(res){
			json = res;
			if(window.console && window.console.log){
				console.log('updating json: '+json);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			if(window.console && window.console.log){
				console.log('error: '+this.url+' -> ('+xhr.status+') '+thrownError);
			}else{
				alert('error: '+this.url+' -> '+xhr.status+': '+thrownError);
			}
		}
	});
	return json;
}
