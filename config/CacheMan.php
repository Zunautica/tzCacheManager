<?php

\Teadaze\frame_hook('preload', function(&$sinker) {
	$cache = "site/cache/".implode('_', $sinker['target']).".cache";
	if(file_exists($cache)) {
		$s = stat($cache);
		if((time() - $s[9]) < 600) {
			array_unshift($sinker['target'], 'CacheMan');
		}
	}
});

\Teadaze\frame_hook('ondispatch', function(&$sinker) {

	if($sinker['target'][0] == 'CacheMan')
		return;

	$fname = "site/cache/".implode('_', $sinker['target']).".cache";
	$fp = fopen($fname, 'w');
	fwrite($fp, $sinker['html']);
	fclose($fp);
});
