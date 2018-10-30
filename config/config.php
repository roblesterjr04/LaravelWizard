<?php
	
return [
	
	'view' => 'wizard',
	
	'routing' => [
		'get'		=> 'wizard',
		'post'		=> 'wizard.post'
	],
	
	'storage' => [
		'key'		=> 'wizard',
		'method'	=> 'session'
	]
	
]