<?php
/**
 * send.php — Обработчик форм для ТД Кайрос Импорт
 * Отправляет заявки на почту tdkairos.import@yandex.ru
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

$to = 'tdkairos.import@yandex.ru';

// Определяем тип формы
$form_type = isset($_POST['form_type']) ? $_POST['form_type'] : 'contact';
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Антиспам — время заполнения (если меньше 3 секунд — бот)
$honeypot = isset($_POST['website']) ? trim($_POST['website']) : '';
if (!empty($honeypot)) {
    exit; // Бот — тихо выходим
}

// Тема письма
$subject = '';
$body = '';

switch ($form_type) {
    case 'quick':
        $subject = 'Быстрая заявка с проф-логист.рф';
        $body = "Имя: $name\nТелефон: $phone\nEmail: $email\nСообщение: $message\n\n—\nФорма быстрой заявки";
        break;

    case 'calc':
        $cargo_type = isset($_POST['cargo_type']) ? $_POST['cargo_type'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
        $volume = isset($_POST['volume']) ? $_POST['volume'] : '';
        $from_city = isset($_POST['from_city']) ? $_POST['from_city'] : '';
        $to_city = isset($_POST['to_city']) ? $_POST['to_city'] : '';

        $subject = 'Расчёт стоимости с проф-логист.рф';
        $body = "Имя: $name\nТелефон: $phone\n"
              . "Тип груза: $cargo_type\n"
              . "Вес (кг): $weight\n"
              . "Объём (м³): $volume\n"
              . "Откуда: $from_city\n"
              . "Куда: $to_city\n\n—\nФорма калькулятора";
        break;

    default: // contact
        $subject = 'Новое сообщение с проф-логист.рф';
        $body = "Имя: $name\nТелефон: $phone\nEmail: $email\n"
              . "Сообщение: $message\n\n—\nФорма обратной связи";
        break;
}

// Заголовки письма
$headers = "From: ТД Кайрос Импорт <tdkairos.import@yandex.ru>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Отправка
mail($to, $subject, $body, $headers);

// Перенаправление на страницу с сообщением
header('Location: /?sent=ok#contact');
exit;
