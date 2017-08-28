<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * StatusCodes provides named constants for
 * HTTP protocol status codes. Written for the
 * Recess Framework (http://www.recessframework.com/)
 * 
 * @author Kris Jordan
 * @license MIT 
 * @package recess.http
 */

class Status_codes {

	// [Informational 1xx]

	const HTTP_CONTINUE = 100;

	const HTTP_SWITCHING_PROTOCOLS = 101;

	const HTTP_PROCESSING = 102;

	// [Successful 2xx]

	const HTTP_OK = 200;

	const HTTP_CREATED = 201;

	const HTTP_ACCEPTED = 202;

	const HTTP_NONAUTHORITATIVE_INFORMATION = 203;

	const HTTP_NO_CONTENT = 204;

	const HTTP_RESET_CONTENT = 205;

	const HTTP_PARTIAL_CONTENT = 206;

	const HTTP_MULTI_STATUS = 207;

	const HTTP_IM_USED = 226;

	// [Redirection 3xx]

	const HTTP_MULTIPLE_CHOICES = 300;

	const HTTP_MOVED_PERMANENTLY = 301;

	const HTTP_FOUND = 302;

	const HTTP_SEE_OTHER = 303;

	const HTTP_NOT_MODIFIED = 304;

	const HTTP_USE_PROXY = 305;

	const HTTP_UNUSED = 306;

	const HTTP_TEMPORARY_REDIRECT = 307;

	const HTTP_RESUME_INCOMPLETE = 308;

	// [Client Error 4xx]

	const errorCodesBeginAt = 400;

	const HTTP_BAD_REQUEST = 400;

	const HTTP_UNAUTHORIZED  = 401;

	const HTTP_PAYMENT_REQUIRED = 402;

	const HTTP_FORBIDDEN = 403;

	const HTTP_NOT_FOUND = 404;

	const HTTP_METHOD_NOT_ALLOWED = 405;

	const HTTP_NOT_ACCEPTABLE = 406;

	const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;

	const HTTP_REQUEST_TIMEOUT = 408;

	const HTTP_CONFLICT = 409;

	const HTTP_GONE = 410;

	const HTTP_LENGTH_REQUIRED = 411;

	const HTTP_PRECONDITION_FAILED = 412;

	const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;

	const HTTP_REQUEST_URI_TOO_LONG = 414;

	const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;

	const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;

	const HTTP_EXPECTATION_FAILED = 417;

	const HTTP_I_AM_A_TEAPOT = 418;

	const HTTP_UNPROCESSABLE_ENTITY = 422;

	const HTTP_LOCKED = 423;

	const HTTP_FAILED_DEPENDENCY = 424;

	const HTTP_UNORDERED_COLLECTION = 425;

	const HTTP_UPGRADE_REQUIRED = 426;

	const HTTP_PRECONDITION_REQUIRED = 428;

	const HTTP_TOO_MANY_REQUESTS = 429;

	const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

	const HTTP_NO_RESPONSE = 444;

	const HTTP_RETRY_WITH = 449;

	const HTTP_BLOCKED_BY_WINDOWS_PARENTAL_CONTROLS = 450;

	const HTTP_CLIENT_CLOSED_REQUEST = 499;

	// [Server Error 5xx]

	const HTTP_INTERNAL_SERVER_ERROR = 500;

	const HTTP_NOT_IMPLEMENTED = 501;

	const HTTP_BAD_GATEWAY = 502;

	const HTTP_SERVICE_UNAVAILABLE = 503;

	const HTTP_GATEWAY_TIMEOUT = 504;

	const HTTP_VERSION_NOT_SUPPORTED = 505;

	const HTTP_VARIANT_ALSO_NEGOTIATES = 506;

	const HTTP_INSUFFICIENT_STORAGE = 507;

	const HTTP_BANDWITH_LIMIT_EXCEEDED = 509;

	const HTTP_NOT_EXTENDED = 510;

	const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;

	const HTTP_NETWORK_READ_TIMEOUT_ERROR = 598;

	const HTTP_NETWORK_CONNECT_TIMEOUT_ERROR = 599;

		

	private static $messages = array(

		// [Informational 1xx]

		100 => 'Informational: Continue',
		101 => 'Informational: Switching Protocols',
		102 => 'Informational: Processing',

		// [Successful 2xx]
		200 => 'Successful: OK',
		201 => 'Successful: Created',
		202 => 'Successful: Accepted',
		203 => 'Successful: Non-Authoritative Information',
		204 => 'Successful: No Content',
		205 => 'Successful: Reset Content',
		206 => 'Successful: Partial Content',
		207 => 'Successful: Multi-Status',
		208 => 'Successful: Already Reported',
		226 => 'Successful: IM Used',

		// [Redirection 3xx]
		300 => 'Redirection: Multiple Choices',
		301 => 'Redirection: Moved Permanently',
		302 => 'Redirection: Found',
		303 => 'Redirection: See Other',
		304 => 'Redirection: Not Modified',
		305 => 'Redirection: Use Proxy',
		306 => 'Redirection: Switch Proxy',
		307 => 'Redirection: Temporary Redirect',
		308 => 'Redirection: Permanent Redirect',

		// [Client Error 4xx]
		400 => 'Client Error: Bad Request',
		401 => 'Client Error: Unauthorized',
		402 => 'Client Error: Payment Required',
		403 => 'Client Error: Forbidden',
		404 => 'Client Error: Not Found',
		405 => 'Client Error: Method Not Allowed',
		406 => 'Client Error: Not Acceptable',
		407 => 'Client Error: Proxy Authentication Required',
		408 => 'Client Error: Request Timeout',
		409 => 'Client Error: Conflict',
		410 => 'Client Error: Gone',
		411 => 'Client Error: Length Required',
		412 => 'Client Error: Precondition Failed',
		413 => 'Client Error: Request Entity Too Large',
		414 => 'Client Error: Request-URI Too Long',
		415 => 'Client Error: Unsupported Media Type',
		416 => 'Client Error: Requested Range Not Satisfiable',
		417 => 'Client Error: Expectation Failed',
		418 => 'Client Error: I\'m a teapot',
		419 => 'Client Error: Authentication Timeout',
		420 => 'Client Error: Enhance Your Calm',
		421 => 'Client Error: Method Failure',
		422 => 'Client Error: Unprocessable Entity',
		423 => 'Client Error: Locked',
		424 => 'Client Error: Failed Dependency',
		425 => 'Client Error: Unordered Collection',
		426 => 'Client Error: Upgrade Required',
		428 => 'Client Error: Precondition Required',
		429 => 'Client Error: Too Many Requests',
		431 => 'Client Error: Request Header Fields Too Large',
		444 => 'Client Error: No Response',
		449 => 'Client Error: Retry With',
		450 => 'Client Error: Blocked by Windows Parental Controls',
		451 => 'Client Error: Redirect',
		452 => 'Client Error: Unavailable For Legal Reasons',
		494 => 'Client Error: Request Header Too Large',
		495 => 'Client Error: Cert Error',
		496 => 'Client Error: No Cert',
		497 => 'Client Error: HTTP to HTTPS',
		499 => 'Client Error: Client Closed Request',

		// [Server Error 5xx]
		500 => 'Server Error: Internal Server Error',
		501 => 'Server Error: Not Implemented',
		502 => 'Server Error: Bad Gateway',
		503 => 'Server Error: Service Unavailable',
		504 => 'Server Error: Gateway Timeout',
		505 => 'Server Error: HTTP Version Not Supported',
		506 => 'Server Error: Variant Also Negotiates',
		507 => 'Server Error: Insufficient Storage',
		508 => 'Server Error: Loop Detected',
		509 => 'Server Error: Bandwidth Limit Exceeded',
		510 => 'Server Error: Not Extended',
		511 => 'Server Error: Network Authentication Required',
		598 => 'Server Error: Network read timeout error',
		599 => 'Server Error: Network connect timeout error'

	);

	
	public function httpHeaderFor($code) {
		return 'HTTP/1.1 ' . $this->$messages[$code];
	}


	public function getMessageForCode($code) {
		return $this->$messages[$code];
	}
	

	public function isError($code) {
		return is_numeric($code) && $code >= $this->HTTP_BAD_REQUEST;
	}
	

	public function canHaveBody($code) {

		return

			// True if not in 100s

			($code < $this->HTTP_CONTINUE || $code >= $this->HTTP_OK)

			&& // and not 204 NO CONTENT

			$code != $this->HTTP_NO_CONTENT

			&& // and not 304 NOT MODIFIED

			$code != $this->HTTP_NOT_MODIFIED;

	}
}

?>

