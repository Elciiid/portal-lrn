<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['weather_enabled'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

try {
    // Load current left panel data
    $leftPanelData = json_decode(file_get_contents('left_panel.json'), true);

    if (!$leftPanelData) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to load current data']);
        exit;
    }

    // Update weather setting
    $leftPanelData['weather_enabled'] = (bool)$input['weather_enabled'];

    // Save updated data
    $result = file_put_contents('left_panel.json', json_encode($leftPanelData, JSON_PRETTY_PRINT));

    if ($result === false) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to save weather settings']);
        exit;
    }

    echo json_encode(['success' => true, 'message' => 'Weather settings saved successfully']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
}
?>