<?php

header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$api_key = "AIzaSyDhmC7sLFGBaiCqOCdUCiaU-25N4-pP8Gc";  
$user_input = json_decode(file_get_contents("php://input"), true)["message"];

$url = "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-pro:generateContent?key=" . $api_key;

$data = [
    "contents" => [
        ["parts" => [["text" => $user_input]]]
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

$response_data = json_decode($response, true);
file_put_contents("debug_log_gemini.txt", json_encode($response_data, JSON_PRETTY_PRINT));

if ($curl_error) {
    echo json_encode(["error" => "cURL Error: " . $curl_error]);
    exit;
}

if (!isset($response_data["candidates"][0]["content"]["parts"][0]["text"])) {
    echo json_encode([
        "error" => "Invalid API response",
        "full_response" => $response_data
    ]);
    exit;
}

$bot_response = $response_data["candidates"][0]["content"]["parts"][0]["text"];

$languages = ['python', 'c', 'cpp', 'java', 'javascript', 'php', 'html', 'css', 'sql', 'bash', 'go', 'swift', 'ruby', 'kotlin', 'r', 'dart'];

foreach ($languages as $lang) {
    $bot_response = str_replace("```$lang", "<pre><code class='language-$lang'>", $bot_response);
}

// Replace Closing Code Block
$bot_response = str_replace("```", "</code></pre>", $bot_response);

// Format the response for better readability
$bot_response = nl2br($bot_response);

echo json_encode(["response" => $bot_response]);

?>
