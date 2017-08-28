// Add context JQuery to Underscore so they can be use together
(function(){
	_.mixin({$: $});
});

function isInt(x) {
	return !isNaN(x) && eval(x).toString().length == parseInt(eval(x)).toString().length
}

function isFloat(x) {
	return !isNaN(x) && !isInt(eval(x)) && x.toString().length > 0
}


function type(o) {
	var TYPES = {
		'undefined'			: 'undefined',
		'number'			: 'number',
		'boolean'			: 'boolean',
		'string'			: 'string',
		'[object Function]'	: 'function',
		'[object RegExp]'	: 'regexp',
		'[object Array]'	: 'array',
		'[object Date]'		: 'date',
		'[object Error]'	: 'error'
	};
	TOSTRING = Object.prototype.toString;
	return TYPES[typeof o] || TYPES[TOSTRING.call(o)] || (o ? 'object' : 'null');
};

function typeOf( obj ) {
	return {}.toString.call( obj ).match(/\s(\w+)/)[1].toLowerCase();
}

function checkTypes( args, types ) {
	args = [].slice.call( args );
	for ( var i = 0; i < types.length; ++i ) {
		if ( typeOf( args[i] ) != types[i] ) {
			throw new TypeError( 'param '+ i +' must be of type '+ types[i] );
		}
	}
}

// USE: normalize('cadena con carácteres extraños');
// RESULT: 'cadena con caracteres extranos';
var normalize = (function() {
	var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç";
	var to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc";
	var mapping = {};

	for(var i = 0, j = from.length; i < j; i++ ){
		mapping[from.charAt(i)] = to.charAt(i);
	}

	return function( str, underscored = false, toUrl = false ) {
		var ret = [];
		for(var i = 0, j = str.length; i < j; i++) {
			var c = str.charAt(i);
			if(mapping.hasOwnProperty(str.charAt(i))){
				ret.push(mapping[c]);
			}else{
				ret.push(c);
			}
		}
		if(underscored){
			return ret.join('').replace( /[^-A-Za-z0-9]+/g, '_' ).toLowerCase();
		}
		if(toUrl){
			return ret.join('').replace( /[^-A-Za-z0-9]+/g, '-' ).toLowerCase();
		}
		return ret.join('');
	}
})();

function ajax(controller, fn, data, debug = false){
	var url = base_url+controller+fn;
	var df = $.Deferred();
	var json = '';
	if(debug){
		alert(data);
		console.log(data);
	}
	return $.ajax({
		type: 'POST',
		url: url,
		cache: false,
		data: 'data='+data,
		success: function(data){
			df.resolve(data);
		},
		error: function(request, status, error){
			//alert(request+': ('+status+') '+error);
			console.dir(new Array(request, status, error));
			df.reject(request+': '+error);
		}
	});
}

$(document).ready(function(){
	//FANCYBOX
	//https://github.com/fancyapps/fancyBox
	$(".fancybox").fancybox({
		helpers: {
			title: {
				type: 'inside'
			}
		},
		openEffect: "none",
		closeEffect: "none",
		closeBtn: true
	});
});