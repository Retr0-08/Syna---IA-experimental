<?php
// api.php — Syna API com Hugging Face

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$action = $_GET['action'] ?? '';

if ($action === 'send_message') {
    $data = json_decode(file_get_contents('php://input'), true);
    $message = trim($data['message'] ?? '');

    if ($message === '') {
        echo json_encode(['error' => 'Mensagem vazia']);
        exit;
    }

    // 🔑 SUA CHAVE AQUI
    $api_key = "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";

    // Modelo gratuito e leve da Hugging Face
    $model_url = "https://api-inference.huggingface.co/models/facebook/blenderbot-400M-distill";

    // Envia a mensagem pra IA
    $response = sendToHuggingFace($message, $api_key, $model_url);

    echo json_encode([
        'user' => $message,
        'syna' => $response
    ]);
    exit;
}

// Função que faz a requisição à API da Hugging Face
function sendToHuggingFace($input, $token, $url) {
    $headers = [
        "Authorization: Bearer $token",
        "Content-Type: application/json"
    ];

    $payload = json_encode(["inputs" => $input]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $result = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($result, true);

    return $data[0]['generated_text'] ?? "Desculpe, algo deu errado ao tentar responder 😕";
}
?>
