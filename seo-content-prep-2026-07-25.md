# SEO-контент для проф-логист.рф

**Дата:** 2026-07-25  
**Подготовила:** Ариадна (копирайтер)

---

## 1. Мета-теги для index.html

### 1.1. Новый title (строка 6)

**Текущий:**
```html
<title>ТД Кайрос Импорт — Доставка грузов из Китая в Россию | Логистика Китай-РФ</title>
```

**Новый (расширенное семантическое ядро, 85 символов):**
```html
<title>Доставка грузов из Китая в Россию — импорт, ВЭД, таможня под ключ | ТД Кайрос Импорт</title>
```

**Куда вставить:** Заменить строку 6 в `/home/openclaw/.openclaw/workspace/logistics-site/index.html`

---

### 1.2. Новый description (строка 7)

**Текущий:**
```html
<meta name="description" content="ТД Кайрос Импорт — профессиональная логистика из Китая в Россию. Доставка фурами до границы Казахстана/Киргизии, далее крытыми вагонами в любой город РФ, а также осуществляем Ж/Д перевозки внутри России на любую ЖД станцию. Надёжно, быстро, прозрачно.">
```

**Новый (расширенное семантическое ядро, ~295 символов):**
```html
<meta name="description" content="Доставка грузов из Китая в Россию под ключ: фуры + Ж/Д вагоны в любой город РФ. Импорт из Китая, ВЭД и таможенное оформление с отсрочкой НДС 30 дней. Стоимость от $2,8/кг. Доставляем сборные грузы, оборудование, текстиль, электронику. Контейнерные и Ж/Д перевозки по РФ. Экспедирование грузов — надёжно, прозрачно, с личным менеджером.">
```

**Куда вставить:** Заменить строку 7

---

### 1.3. Новый keywords (строка 8)

**Текущий:**
```html
<meta name="keywords" content="доставка из Китая в Россию, логистика Китай, грузоперевозки Китай РФ, фуры из Китая, жд доставка из Китая, ТД Кайрос Импорт, логистическая компания Китай">
```

**Новый:**
```html
<meta name="keywords" content="доставка из Китая в Россию, импорт из Китая, ВЭД Китай, стоимость доставки из Китая, таможенный брокер Китай, контейнерные перевозки Китай Россия, ЖД перевозки по России, доставка сборных грузов, логистика под ключ, экспедирование грузов, фрахт из Китая, таможенное оформление грузов, грузоперевозки Китай РФ, растаможка грузов из Китая, ТД Кайрос Импорт">
```

**Куда вставить:** Заменить строку 8

---

### 1.4. Добавить canonical URL (после строки 12, перед OG)

Вставить **после строки 12** (после `ICBM`):
```html
  <link rel="canonical" href="https://проф-логист.рф/">
```

---

## 2. Twitter Cards для index.html

Вставить **после строки 22** (после `og:site_name`, перед комментарием `<!-- JSON-LD Microdata -->`):

```html
  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Доставка грузов из Китая в Россию — импорт, ВЭД, таможня под ключ | ТД Кайрос Импорт">
  <meta name="twitter:description" content="Импорт из Китая в Россию: фуры + Ж/Д вагоны. Таможня под ключ с отсрочкой НДС 30 дней. От $2,8/кг. Доставка сборных грузов, контейнерные и Ж/Д перевозки по РФ.">
  <meta name="twitter:image" content="https://xn----8sbq4agjnli4d.xn--p1ai/og-image.svg">
  <meta name="twitter:site" content="@KairosImport">
```

---

## 3. Мета-теги и Twitter Cards для vagonmarket.html

### 3.1. Добавить canonical URL (после строки 8, перед OG)

Вставить **после строки 8** (после keywords):
```html
  <link rel="canonical" href="https://проф-логист.рф/vagonmarket.html">

  <!-- geo meta tags -->
  <meta name="geo.region" content="RU-CN-KZ">
  <meta name="geo.placename" content="Россия — Китай — Казахстан">
  <meta name="geo.position" content="55.7558;37.6173">
  <meta name="ICBM" content="55.7558, 37.6173">
```

### 3.2. Twitter Cards (после строки 17, после OG)

Вставить **после строки 17** (после `og:site_name`):
```html
  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Вагон идёт порожняком? Заработай на обратном рейсе | VagonMarket">
  <meta name="twitter:description" content="Порожняк — потерянные деньги. Размести вагон в @VagonMarketBot, найди попутный груз и заработай на обратном рейсе. Ставку назначаешь ты.">
  <meta name="twitter:image" content="https://xn----8sbq4agjnli4d.xn--p1ai/og-image.svg">
  <meta name="twitter:site" content="@KairosImport">
```

---

## 4. Страница 404.html — полный HTML-код

Полный файл `/home/openclaw/.openclaw/workspace/logistics-site/404.html`:

```html
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Страница не найдена (404) | ТД Кайрос Импорт</title>
  <meta name="robots" content="noindex, follow">
  <meta name="description" content="Страница не найдена. Перейдите на главную или в популярные разделы сайта: доставка грузов из Китая, VagonMarket, контакты.">

  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    :root {
      --gold: #C9A96E;
      --gold-light: #dfc066;
      --dark: #0f1f3d;
      --dark-mid: #1c3354;
      --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
    body {
      font-family: var(--font);
      background: linear-gradient(135deg, var(--dark), var(--dark-mid));
      color: #fff;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }
    .container {
      text-align: center;
      max-width: 560px;
    }
    .error-code {
      font-size: clamp(5rem, 12vw, 8rem);
      font-weight: 900;
      background: linear-gradient(135deg, var(--gold), var(--gold-light));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
      margin-bottom: 8px;
    }
    h1 {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 16px;
      color: #fff;
    }
    p {
      font-size: 0.95rem;
      color: rgba(255,255,255,0.65);
      line-height: 1.7;
      margin-bottom: 36px;
    }
    .links {
      display: flex;
      flex-direction: column;
      gap: 12px;
      align-items: center;
    }
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 36px;
      border-radius: 26px;
      font-size: 0.95rem;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.3s ease;
      min-width: 220px;
    }
    .btn--primary {
      background: linear-gradient(135deg, var(--gold), #a8882e);
      color: var(--dark);
      box-shadow: 0 4px 20px rgba(201,168,76,0.35);
    }
    .btn--primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 30px rgba(201,168,76,0.5);
    }
    .btn--outline {
      border: 1.5px solid var(--gold);
      color: var(--gold);
      background: transparent;
    }
    .btn--outline:hover {
      background: rgba(201,168,76,0.1);
    }
    .links a:not(.btn) {
      color: var(--gold);
      text-decoration: none;
      font-size: 0.9rem;
      transition: color 0.2s;
    }
    .links a:not(.btn):hover {
      color: var(--gold-light);
      text-decoration: underline;
    }
    .divider {
      width: 60px;
      height: 2px;
      background: var(--gold);
      opacity: 0.3;
      margin: 20px auto;
    }
    .quick-links {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="error-code">404</div>
    <h1>Страница не найдена</h1>
    <p>Возможно, страница была перемещена или удалена.<br>Попробуйте начать с главной — мы поможем с доставкой грузов из Китая в Россию.</p>

    <div class="links">
      <a href="/" class="btn btn--primary">← На главную</a>
      <div class="divider"></div>
      <div class="quick-links">
        <a href="/#services">Услуги и маршруты</a>
        <a href="/vagonmarket.html">VagonMarket — попутные вагоны</a>
        <a href="/#calculator">Калькулятор стоимости</a>
        <a href="/#contacts">Контакты</a>
      </div>
    </div>
  </div>
</body>
</html>
```

---

## 5. BreadcrumbList JSON-LD

### 5.1. Для index.html

**Путь:** Главная

**Полный JSON-LD код (вставить перед закрывающим `</head>`, после всех JSON-LD блоков):**

```html
  <!-- BreadcrumbList Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "@id": "https://xn----8sbq4agjnli4d.xn--p1ai/#breadcrumb",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Главная",
        "item": "https://xn----8sbq4agjnli4d.xn--p1ai/"
      }
    ]
  }
  </script>
```

### 5.2. Для vagonmarket.html

**Путь:** Главная → VagonMarket

**Полный JSON-LD код (вставить перед закрывающим `</head>`, после всех JSON-LD блоков):**

```html
  <!-- BreadcrumbList Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "@id": "https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html#breadcrumb",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Главная",
        "item": "https://xn----8sbq4agjnli4d.xn--p1ai/"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "VagonMarket — попутные вагоны",
        "item": "https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html"
      }
    ]
  }
  </script>
```

---

## 6. Чистка JSON-LD @id — исправление на латинице (Punycode)

### 6.1. index.html — все блоки JSON-LD

В файле есть 3 JSON-LD блока:

**Блок 1 — LocalBusiness (текущая строка ~25-42):**
- `"@id": "https://проф-логист.рф/#organization"` → `"@id": "https://xn----8sbq4agjnli4d.xn--p1ai/#organization"`
- `"url": "https://проф-логист.рф"` → `"url": "https://xn----8sbq4agjnli4d.xn--p1ai"`

**Блок 2 — FAQPage (текущая строка ~43-88):**
- `"@id": "https://проф-логист.рф/#faq"` → `"@id": "https://xn----8sbq4agjnli4d.xn--p1ai/#faq"`

**Блок 3 — HowTo (текущая строка ~89-120):**
- `"@id": "https://проф-логист.рф/#howto"` → `"@id": "https://xn----8sbq4agjnli4d.xn--p1ai/#howto"`

### 6.2. vagonmarket.html — все блоки JSON-LD

**Блок 1 — OG:url (строка 6):**
- `"url": "https://проф-логист.рф/vagonmarket.html"` — оставить как есть (OG тег, не JSON), но лучше заменить на Punycode:
  `content="https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html"`

**Блок 2 — WebApplication (текущая строка ~57-69):**
- `"@id": "https://проф-логист.рф/vagonmarket.html#app"` → `"@id": "https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html#app"`
- `"url": "https://t.me/VagonMarketBot"` — оставить (внешний URL)

**Блок 3 — FAQPage (текущая строка ~70-98):**
- `"@id": "https://проф-логист.рф/vagonmarket.html#faq"` → `"@id": "https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html#faq"`

**Блок 4 — HowTo (текущая строка ~99-120):**
- `"@id": "https://проф-логист.рф/vagonmarket.html#howto"` → `"@id": "https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html#howto"`

### 6.3. Итоговая таблица замен

| Файл | JSON-LD блок | Было | Стало |
|------|-------------|------|-------|
| index.html | LocalBusiness @id | `https://проф-логист.рф/#organization` | `https://xn----8sbq4agjnli4d.xn--p1ai/#organization` |
| index.html | LocalBusiness url | `https://проф-логист.рф` | `https://xn----8sbq4agjnli4d.xn--p1ai` |
| index.html | FAQPage @id | `https://проф-логист.рф/#faq` | `https://xn----8sbq4agjnli4d.xn--p1ai/#faq` |
| index.html | HowTo @id | `https://проф-логист.рф/#howto` | `https://xn----8sbq4agjnli4d.xn--p1ai/#howto` |
| vagonmarket.html | OG:url | `https://проф-логист.рф/vagonmarket.html` | `https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html` |
| vagonmarket.html | WebApplication @id | `https://проф-логист.рф/vagonmarket.html#app` | `https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html#app` |
| vagonmarket.html | FAQPage @id | `https://проф-логист.рф/vagonmarket.html#faq` | `https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html#faq` |
| vagonmarket.html | HowTo @id | `https://проф-логист.рф/vagonmarket.html#howto` | `https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html#howto` |

**Примечание:** Яндекс.Метрика, OG:url и canonical URL могут оставаться на кириллическом домене (Яндекс понимает), но для Google рекомендуется Punycode.

---

## 7. Текстовые блоки для локального SEO (доставка из Китая по городам)

Эти блоки предназначены для вставки в раздел `.geo-summary` на `index.html` — как дополнительная карточка "География доставки" или отдельный блок между `geo-summary` и `calculator`.

### Москва
> **Доставка из Китая в Москву:** отправляем сборные и полнофузовые грузы фурами до границы, затем крытыми вагонами на ж/д станции Москвы. Срок от двери до двери — 18–25 дней. Стоимость от $2,8/кг. Полное таможенное оформление и доставка до двери по Москве и Московской области.

### Санкт-Петербург
> **Доставка из Китая в Санкт-Петербург:** мультимодальный маршрут: фура до границы Казахстана/Киргизии + крытый вагон до СПб. Срок 20–25 дней. Растаможка и экспедирование под ключ. Доставка сборных грузов, оборудования, текстиля, электроники.

### Новосибирск
> **Доставка из Китая в Новосибирск:** Ж/Д перевозка крытыми вагонами из Китая через границу в Новосибирск — надёжно и выгодно. Отправляем сборные грузы, оборудование, товары народного потребления. Таможня под ключ с отсрочкой НДС 30 дней.

### Красноярск
> **Доставка из Китая в Красноярск:** мультимодальная логистика — фурой до границы и крытым вагоном по Ж/Д до Красноярска. Принимаем оборудование, химию, запчасти, продукты. Полное ВЭД-сопровождение и таможенное оформление.

### Екатеринбург
> **Доставка из Китая в Екатеринбург:** транзит через Казахстан фурой + Ж/Д до Екатеринбурга. Срок 18–25 дней. Растаможка, сертификация, отсрочка НДС. От $2,8/кг для сборных грузов. Индивидуальный подход к каждому клиенту.

### Владивосток
> **Доставка из Китая в Владивосток:** доставляем грузы из Китая во Владивосток фурами через границу и по Ж/Д. Контейнерные перевозки, сборные грузы, ВЭД-логистика. Полный цикл: забор груза от поставщика в КНР → таможня → доставка до двери.

---

## Приложение: Сводная таблица вставок

### index.html

| Что вставить | После строки | Код |
|-------------|-------------|-----|
| Новый title | Заменить строку 6 | см. п.1.1 |
| Новый description | Заменить строку 7 | см. п.1.2 |
| Новый keywords | Заменить строку 8 | см. п.1.3 |
| canonical URL | После строки 12 | `<link rel="canonical" href="https://проф-логист.рф/">` |
| Twitter Cards | После строки 22 | см. п.2 |
| BreadcrumbList JSON-LD | Перед `</head>` | см. п.5.1 |
| Исправленные @id | Во всех 3 JSON-LD блоках | см. п.6.1 |

### vagonmarket.html

| Что вставить | После строки | Код |
|-------------|-------------|------|
| canonical URL + geo | После строки 8 | см. п.3.1 |
| Twitter Cards | После строки 17 | см. п.3.2 |
| BreadcrumbList JSON-LD | Перед `</head>` | см. п.5.2 |
| Исправленные @id | Во всех 3 JSON-LD блоках | см. п.6.2 |

### Новые файлы

| Файл | Путь |
|------|------|
| 404.html | `/home/openclaw/.openclaw/workspace/logistics-site/404.html` |
