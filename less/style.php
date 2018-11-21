<?php

// http://leafo.net/lessphp/

// This acts as a compiled LESS master file. Refer to this in the HTML.
// Make sure the cache directory is writeable!

// Make this file act as a CSS
header("Content-type: text/css", true);

require_once 'lessphp/Less.php';

// Site root on server filesystem
// E.g. "/var/www/mywebsite";
$path = "/";

// Cache directory path from site root
// E.g. "/assets/less/lessphp/cache"
$cache_path = "/less/lessphp/cache";

// Fetch all .less files in directory and compile them in a list of @imports
$lessfiles = "";
foreach ( glob("*.less") as $filename ) {
	$lessfiles .= "@import \"$filename\"; \n";
}

try{
$options = array(
	'cache_dir'
	=>
	$path.$cache_path
);
$parser = new Less_Parser( $options );
$parser->parse( $lessfiles );

// Parse a LESS file of which path is stored in the "parseFile" array
$_GET["parseFile"] ? $parser->parseFile( $path . $_GET["parseFile"] ) : false ;

// Parse inline LESS that's stored in the "parse" array
$_GET["parse"] ? $parser->parse( $_GET["parse"] ) : false ;

echo $css = $parser->getCss();
}catch(Exception $e){
    echo $error_message = $e->getMessage();
}

?>
