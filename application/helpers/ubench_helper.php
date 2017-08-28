<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * UBENCH start alias
 */
function u_start(){
	get_instance()->ubench->start();
}

/*
 * UBENCH end alias
 */
function u_end(){
	get_instance()->ubench->end();
}

/*
 * UBENCH getTime alias
 */
function u_getTime($raw = false, $format = null){
	return get_instance()->ubench->getTime($raw, $format);
}

/*
 * UBENCH getMemoryUsage alias
 */
function getMemoryUsage($raw = false, $format = null){
	return get_instance()->ubench->getMemoryUsage($raw, $format);
}

/*
 * UBENCH getMemoryPeak alias
 */
function getMemoryPeak($raw = false, $format = null){
	return get_instance()->ubench->getMemoryPeak($raw, $format);
}

/*
 * UBENCH run alias
 */
function run(callable $callable){
	return get_instance()->ubench->run($callable);
}

/*
 * UBENCH readableSize alias
 */
function readableSize($size, $format = null, $round = 3){
	return get_instance()->ubench->readableSize($size, $format, $round);
}

/*
 * UBENCH readableElapsedTime alias
 */
function readableElapsedTime($microtime, $format = null, $round = 3){
	return get_instance()->ubench->readableElapsedTime($microtime, $format, $round);
}

?>