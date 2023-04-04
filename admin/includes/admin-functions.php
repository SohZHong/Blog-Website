<?php

function trimstr($length, $string, $link){
    // strip tags to avoid breaking any html
    $string = strip_tags($string);

    if (strlen($string) > $length) {

        // truncate string
        $stringCut = substr($string, 0, $length);

        // make sure it ends in a word so words don't break off...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <br><br><a class="read-more-btn" href="'.$link.'">Read More</a>'; 
    }

    return $string;
};

function geturl(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
        $url = "https://"; 
    }
    else{
        $url = "http://";  
    }  

    // Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url .= $_SERVER['REQUEST_URI'];
    
    return $url; 
};

function add_QS($url, $key, $value) {
    $url = preg_replace('/(?:&|(\?))'.$key.'=[^&]*(?(1)&|)?/i', "$1", $url);
    $url_parts = parse_url($url);

    // If URL doesn't have a query string.
	if (!isset($url_parts['query'])) {// Avoid 'Undefined index: query'
        return ($url .'?'. $key .'='. $value);
	} else {
		return ($url .'&'. $key .'='. $value);
	}
}

?>