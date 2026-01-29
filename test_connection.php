<?php
$url = 'http://127.0.0.1:8009/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_HEADER, false);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);

curl_close($ch);

if ($error) {
    echo "CURL Error: " . $error . "\n";
} else {
    echo "HTTP Code: " . $httpCode . "\n";
    if ($httpCode == 200) {
        echo "SUCCESS: Application is responding correctly!\n";
        if (strpos($response, 'You\'reHired') !== false) {
            echo "CONFIRMED: Welcome page with 'You'reHired' branding is present.\n";
        }
    } else {
        echo "Response body (first 500 chars):\n";
        echo substr($response, 0, 500) . "...\n";
    }
}
?>