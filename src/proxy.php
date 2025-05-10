<?php
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['url'])) {
    http_response_code(400);
    echo "Missing parameter";
    exit;
}

$base = 'https://setup.rbxcdn.com/';
$targetUrl = $base . ltrim($_GET['url'], '/');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
http_response_code($httpCode);
header("Content-Type: " . $contentType);
echo $response;
?>
