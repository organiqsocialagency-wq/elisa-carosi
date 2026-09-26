<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');

function reply(int $status, bool $ok): never {
    http_response_code($status);
    echo json_encode(['ok' => $ok]);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') reply(405, false);
if ((int)($_SERVER['CONTENT_LENGTH'] ?? 0) > 12000) reply(413, false);
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin !== '' && !in_array($origin, ['https://elisacarosiperformer.it', 'https://www.elisacarosiperformer.it'], true)) reply(403, false);
$data = json_decode(file_get_contents('php://input') ?: '', true);
if (!is_array($data)) reply(400, false);
if (!empty($data['website'])) reply(200, true);

function field(array $data, string $key, int $limit): string {
    $value = $data[$key] ?? '';
    if (!is_string($value)) reply(400, false);
    $value = trim(str_replace(["\r", "\0"], '', $value));
    if (strlen($value) > $limit) reply(400, false);
    return $value;
}
$type = field($data, 'type', 10);
if (!in_array($type, ['quote', 'custom'], true)) reply(400, false);
$name = field($data, 'name', 100);
$email = field($data, 'email', 254);
$date = field($data, 'date', 10);
$time = field($data, 'time', 5);
$endTime = field($data, 'endTime', 5);
$notes = field($data, 'notes', 8000);
if (strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL)) reply(400, false);
$eventDate = DateTimeImmutable::createFromFormat('!Y-m-d', $date, new DateTimeZone('Europe/Rome'));
if (!$eventDate || $eventDate->format('Y-m-d') !== $date || $eventDate < new DateTimeImmutable('today', new DateTimeZone('Europe/Rome'))) reply(400, false);
function eventMinutes(string $value): int {
    if (!preg_match('/^(?:[01][0-9]|2[0-3]):(?:00|30)$/', $value)) reply(400, false);
    [$hour, $minute] = array_map('intval', explode(':', $value));
    return ($hour < 8 ? $hour + 24 : $hour) * 60 + $minute;
}
$startMinutes = eventMinutes($time);
$endMinutes = eventMinutes($endTime);
if ($startMinutes < 480 || $endMinutes > 1680 || $endMinutes <= $startMinutes) reply(400, false);
$startLabel = $time . ($startMinutes >= 1440 ? ' (giorno dopo)' : '');
$endLabel = $endTime . ($endMinutes >= 1440 ? ' (giorno dopo)' : '');

$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateFile = sys_get_temp_dir() . '/elisa-request-' . hash('sha256', $ip);
$handle = @fopen($rateFile, 'c+');
if (!$handle || !flock($handle, LOCK_EX)) reply(503, false);
$last = (int)stream_get_contents($handle);
if (time() - $last < 60) { flock($handle, LOCK_UN); fclose($handle); reply(429, false); }

$lines = ["Nuova richiesta dal sito", '', "Nome: $name", "Email: $email", "Data della serata: $date", "Inizio serata: $startLabel", "Fine serata: $endLabel", ''];
if ($type === 'quote') {
    foreach (['items', 'supplements', 'pending'] as $key) {
        if (!isset($data[$key]) || !is_array($data[$key]) || count($data[$key]) > 20) reply(400, false);
    }
    if (count($data['items']) < 1) reply(400, false);
    $lines[] = 'Scaletta richiesta:';
    foreach ($data['items'] as $item) {
        if (!is_string($item) || strlen($item) > 160) reply(400, false);
        $lines[] = '- ' . str_replace("\n", ' ', $item);
    }
    foreach ($data['supplements'] as $item) {
        if (!is_string($item) || strlen($item) > 160) reply(400, false);
        $lines[] = '- ' . str_replace("\n", ' ', $item);
    }
    if ($data['pending']) {
        $lines[] = '';
        $lines[] = 'Struttura da verificare:';
        foreach ($data['pending'] as $item) {
            if (!is_string($item) || strlen($item) > 100) reply(400, false);
            $lines[] = '- ' . str_replace("\n", ' ', $item);
        }
    }
    $lines[] = '';
    $lines[] = 'Totale indicativo: ' . field($data, 'total', 40);
    $subject = 'Richiesta preventivo dal sito Elisa Carosi';
} else {
    $lines[] = 'Performance personalizzata';
    $lines[] = 'Tipo di evento: ' . field($data, 'event', 100);
    $lines[] = 'Luogo: ' . field($data, 'place', 180);
    $idea = field($data, 'idea', 2000);
    if ($idea === '' || field($data, 'place', 180) === '') reply(400, false);
    $lines[] = '';
    $lines[] = "Idea:\n" . $idea;
    $subject = 'Richiesta performance personalizzata - Elisa Carosi';
}
if ($notes !== '') {
    $lines[] = '';
    $lines[] = "Note aggiuntive:\n" . $notes;
}
$headers = [
    'From: Sito Elisa Carosi <no-reply@elisacarosiperformer.it>',
    'Reply-To: ' . $email,
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . PHP_VERSION
];
$sent = @mail('elisa.carosi@me.com', $subject, implode("\n", $lines), implode("\r\n", $headers));
if ($sent) {
    ftruncate($handle, 0);
    rewind($handle);
    fwrite($handle, (string)time());
    fflush($handle);
}
flock($handle, LOCK_UN);
fclose($handle);
reply($sent ? 200 : 503, $sent);
