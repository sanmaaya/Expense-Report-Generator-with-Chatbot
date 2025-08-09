<?php
$apiKey = 'YOUR_OPENAI_API_KEY';  // Replace with your OpenAI key
$request = json_decode(file_get_contents("php://input"), true);
$prompt = $request['prompt'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Content-Type: application/json",
  "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
  "model" => "gpt-3.5-turbo",
  "messages" => [["role" => "user", "content" => $prompt]],
  "temperature" => 0.7
]));
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
$reply = $data['choices'][0]['message']['content'];
echo json_encode(["response" => $reply]);
?>
