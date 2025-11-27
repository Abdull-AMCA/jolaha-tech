<?php
// chat_proxy.php - GROQ WITH CUSTOM KNOWLEDGE
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$input = json_decode(file_get_contents('php://input'), true);
$user_message = $input['message'] ?? '';
$conversation_history = $input['history'] ?? [];

// Build messages array
$messages = [];

// CUSTOM SYSTEM PROMPT WITH COMPANY KNOWLEDGE
$messages[] = ["role" => "system", "content" => "You are a helpful, friendly, and professional assistant for Jolaha Company. 

## ABOUT JOLAHA:
Jolaha Technology is a leading technology company that specializes in:
- Web Development and Design
- Mobile App Development (iOS & Android)
- E-commerce Solutions
- Digital Marketing Services
- Cloud Computing Solutions
- IT Consulting
- Software Maintenance and Support

## COMPANY DETAILS:
- Founded: 2018
- Headquarters: Dubai UAE.
- Team Size: 50+ professionals
- Industries Served: Healthcare, Finance, Retail, Education, Manufacturing

## KEY SERVICES IN DETAIL:
1. **Web Development**: Custom websites, responsive design, CMS development
2. **Mobile App Development**: Native and cross-platform mobile applications
3. **E-commerce Solutions**: Online stores, payment integration, inventory management
4. **Digital Marketing**: SEO, social media marketing, PPC campaigns
5. **Cloud Services**: AWS, Azure, Google Cloud implementation and management

## CONTACT INFORMATION:
- Email: contact@jolaha.com
- Phone: +1-555-123-4567
- Website: www.jolaha.com
- Office Hours: Monday-Friday, 9:00 AM - 6:00 PM

## RESPONSE GUIDELINES:
- Always be professional and helpful
- Provide specific information about Jolaha's services when asked
- If you don't know something, admit it but stay positive
- Keep answers concise but informative
- Use bullet points when listing services or features"];

// Add conversation history
foreach ($conversation_history as $msg) {
    $messages[] = $msg;
}

// Add current user message
$messages[] = ["role" => "user", "content" => $user_message];

// Prepare data for Groq
$data = [
    "model" => "llama-3.1-8b-instant",
    "messages" => $messages,
    "max_tokens" => 250, // Increased slightly for more detailed responses
    "temperature" => 0.7,
    "stream" => false
];

$ch = curl_init('https://api.groq.com/openai/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer '
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_error($ch)) {
    echo json_encode(['error' => 'Curl error: ' . curl_error($ch)]);
    curl_close($ch);
    exit;
}

if ($http_code !== 200) {
    echo json_encode(['error' => 'Groq API error: ' . $http_code . ' - ' . $response]);
    curl_close($ch);
    exit;
}

curl_close($ch);

$response_data = json_decode($response, true);

if (isset($response_data['choices'][0]['message']['content'])) {
    $ai_reply = trim($response_data['choices'][0]['message']['content']);
} else {
    $ai_reply = 'I apologize, but I encountered an issue generating a response. Please try again.';
}

echo json_encode(['reply' => $ai_reply]);
?>