<?php

// http://leafo.net/lessphp/
// This acts as a compiled LESS master file. Refer to this in the HTML.
// Make sure the cache directory is writeable!

// Make this file act as a CSS
header("Content-type: text/css", true);

require_once 'lessphp/Less.php';

// Directory where this php file is directory
$path = __DIR__;

// Fetch all .less files in the less directory and compile them in a list of @imports
// Currently it goes down one level, but can be expanded
// less/*.less
// less/*/*.less
$lessfiles = "";
foreach ( glob("{less/*.less,less/*/*.less}",GLOB_BRACE) as $filename ) {
	$lessfiles .= "@import \"$filename\"; \n";
}

echo "/* \n" . $lessfiles . "*/ \n \n";

try {
	$options = array();

	// ENABLE CACHE
	//$options = array(
	//	'cache_dir'
	//	=>
	//	$path.'/lessphp/cache'
	//);

	$parser = new Less_Parser( $options );
	$parser->parse( $lessfiles );

	// Parse a LESS file of which path is stored in the "parseFile" array
	// $_GET["parseFile"] ? $parser->parseFile( $path . "/content/" . $_GET["parseFile"] ) : false ;

	// Parse inline LESS that's stored in the "parse" array
	// $_GET["parse"] ? $parser->parse( $_GET["parse"] ) : false ;

	echo $css = $parser->getCss();
} catch( Exception $e ) {
	echo $error_message = $e->getMessage();
}

?>
