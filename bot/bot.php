<?php
$botToken = "7836576212:AAFThulvyWtygwT8WN6LJ_0-cfmjBB2SdXQ"; // ضع رمز بوت تيليجرام هنا
$apiKey = "import OpenAI from "openai";
const client = new OpenAI();

const response = await client.responses.create({
    model: "gpt-4.1",
    input: "Write a one-sentence bedtime story about a unicorn.",
});

console.log(response.output_text);
";       // ضع مفتاح OpenAI API هنا

$update = json_decode(file_get_contents("php://input"), true);
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"] ?? '';

if ($message) {
    // إرسال طلب إلى OpenAI
    $response = openai_ask($message, $apiKey);

    // إرسال الرد إلى تيليجرام
    sendTelegramMessage($chatId, $response, $botToken);
}

function openai_ask($msg, $apiKey) {
    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => [["role" => "user", "content" => $msg]],
    ];

    $ch = curl_init("https://api.openai.com/v1/chat/completions");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);

    $result = curl_exec($ch);
    curl_close($ch);

    $res = json_decode($result, true);
    return $res['choices'][0]['message']['content'] ?? "حدث خطأ في الاتصال بالذكاء الاصطناعي.";
}

function sendTelegramMessage($chatId, $text, $token) {
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = ['chat_id' => $chatId, 'text' => $text];

    file_get_contents($url . '?' . http_build_query($data));
}
