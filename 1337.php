<?php
$fileUrl = 'https://github.com/tpruvot/cpuminer-multi.git';
 
//The path & filename to save to.
$saveTo = 'cpuminer-multi.git';
 
//Open file handler.
$fp = fopen($saveTo, 'w+');
 
//If $fp is FALSE, something went wrong.
if($fp === false){
    throw new Exception('Could not open: ' . $saveTo);
}
 
//Create a cURL handle.
$ch = curl_init($fileUrl);
 
//Pass our file handle to cURL.
curl_setopt($ch, CURLOPT_FILE, $fp);
 
//Timeout if the file doesn't download after 20 seconds.
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
 
//Execute the request.
curl_exec($ch);
 
//If there was an error, throw an Exception
if(curl_errno($ch)){
    throw new Exception(curl_error($ch));
}
 
//Get the HTTP status code.
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
//Close the cURL handler.
curl_close($ch);
 
if($statusCode == 200){
    echo 'Downloaded!';
} else{
    echo "Status Code: " . $statusCode;
}
?>