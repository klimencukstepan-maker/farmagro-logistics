# Отчёт о проверке SEO-правок
**Дата:** 2026-07-25  
**Проверила:** Вероника (тестировщик)  
**Сайт:** проф-логист.рф  

---

## Результат проверки

### ✅ Пройдено:

**1. Мета-теги:**
- `title` — присутствует на всех страницах, не пустой, ≤ 100 символов:
  - index.html — 84 символа ✅
  - vagonmarket.html — 64 символа ✅
  - 404.html — 44 символа ✅
- `keywords` — присутствуют на index.html и vagonmarket.html ✅
- `charset` (UTF-8) и `viewport` — есть на всех 3 страницах ✅

**3. Twitter Cards:**
- Все теги на месте на обеих страницах (`twitter:card`, `twitter:title`, `twitter:description`, `twitter:image`) ✅
- `twitter:image` использует Punycode во всех случаях ✅
- Открывающие/закрывающие теги корректны ✅

**5. JSON-LD микроразметка:**
- Все блоки валидны (проверено `python3 -m json.tool`) ✅
  - index.html: LocalBusiness, FAQPage, HowTo, BreadcrumbList — 4/4 OK
  - vagonmarket.html: WebApplication, FAQPage, HowTo, BreadcrumbList — 4/4 OK
- Все `@id` без кириллицы (используется Punycode `xn----8sbq4agjnli4d.xn--p1ai`) ✅
- BreadcrumbList добавлен на обе страницы ✅

**6. 404.html:**
- Файл существует ✅
- Валидный HTML (DOCTYPE, charset, viewport, стили) ✅
- Есть навигация/ссылки на главные разделы: Главная, Услуги, VagonMarket, Калькулятор, Контакты ✅
- Есть мета-теги (title, description) ✅
- `robots: noindex, follow` — корректно установлен ✅

**8. Git:**
- Последний коммит содержит SEO-изменения: `1086024 SEO-исправления: мета-теги, canonical, Twitter Cards, 404, BreadcrumbList, чистка JSON-LD` ✅
- Изменены файлы: 404.html (+134), index.html (+40), vagonmarket.html (+46), .htaccess — в коммите не фигурирует

---

### ❌ Найдено ошибок:

**Ошибка 1. Description превышает 320 символов — index.html**
- **Файл:** `index.html`
- **Описание:** 335 символов (лимит: 320)
- **Текущее значение:** `"Доставка грузов из Китая в Россию под ключ: фуры + Ж/Д вагоны в любой город РФ. Импорт из Китая, ВЭД и таможенное оформление с отсрочкой НДС 30 дней. Стоимость от $2,8/кг. Доставляем сборные грузы, оборудование, текстиль, электронику. Контейнерные и Ж/Д перевозки по РФ. Экспедирование грузов — надёжно, прозрачно, с личным менеджером."`
- **Исправление:** сократить на ~15 символов (например, убрать `"Экспедирование грузов — "` или заменить более короткими фразами)

**Ошибка 2. Canonical URL содержит кириллицу — index.html**
- **Файл:** `index.html`
- **Строка:** `<link rel="canonical" href="https://проф-логист.рф/">`
- **Ошибка:** URL на кириллице. Должен быть Punycode: `https://xn----8sbq4agjnli4d.xn--p1ai/`
- **Исправление:** заменить `href="https://проф-логист.рф/"` на `href="https://xn----8sbq4agjnli4d.xn--p1ai/"`

**Ошибка 3. Canonical URL содержит кириллицу — vagonmarket.html**
- **Файл:** `vagonmarket.html`
- **Строка:** `<link rel="canonical" href="https://проф-логист.рф/vagonmarket.html">`
- **Ошибка:** URL на кириллице. Должен быть Punycode.
- **Исправление:** заменить на `href="https://xn----8sbq4agjnli4d.xn--p1ai/vagonmarket.html"`

**Ошибка 4. Open Graph: og:url содержит кириллицу — index.html**
- **Файл:** `index.html`
- **Строка:** `<meta property="og:url" content="https://проф-логист.рф">`
- **Исправление:** заменить на `content="https://xn----8sbq4agjnli4d.xn--p1ai"`

**Ошибка 5. Open Graph: og:image содержит кириллицу — index.html и vagonmarket.html**
- **Файлы:** `index.html` и `vagonmarket.html`
- **Строка:** `<meta property="og:image" content="https://проф-логист.рф/og-image.svg">`
- **Исправление:** заменить на `content="https://xn----8sbq4agjnli4d.xn--p1ai/og-image.svg"` (на обеих страницах)

**Ошибка 6. .htaccess отсутствует**
- **Путь:** `/home/openclaw/.openclaw/workspace/logistics-site/.htaccess`
- **Ошибка:** Файл не создан
- **Исправление:** создать `.htaccess` в корне сайта с редиректом на 404.html и настройками кэширования (пример ниже в замечаниях)

---

### ⚠️ Замечания:

1. **VagonMarket: og:url в порядке** — отмечу, что на vagonmarket.html `og:url` уже использует Punycode ✅, однако `og:image` на той же странице — нет ❌. Несоответствие стиля.

2. **404.html: отсутствуют keywords** — для страницы 404 это допустимо (она помечена `noindex`), но для единообразия можно добавить.

3. **Рекомендуемый .htaccess:**
   ```
   ErrorDocument 404 /404.html

   <IfModule mod_expires.c>
     ExpiresActive On
     ExpiresByType text/css "access plus 1 year"
     ExpiresByType text/javascript "access plus 1 year"
     ExpiresByType image/svg+xml "access plus 1 year"
     ExpiresByType image/png "access plus 1 year"
     ExpiresByType image/jpeg "access plus 1 year"
     ExpiresByType image/webp "access plus 1 year"
     ExpiresByType font/woff2 "access plus 1 year"
     ExpiresByType application/javascript "access plus 1 year"
   </IfModule>

   <IfModule mod_headers.c>
     <FilesMatch "\.(css|js|svg|png|jpg|jpeg|webp|woff2)$">
       Header set Cache-Control "public, max-age=31536000, immutable"
     </FilesMatch>
   </IfModule>

   Redirect 301 /index.html /
   ```

---

### Вердикт: НА ДОРАБОТКУ

Обнаружено **6 ошибок**, которые необходимо исправить перед финальным принятием:

| # | Описание | Файл | Серьёзность |
|---|----------|------|-------------|
| 1 | Description > 320 символов | index.html | Средняя |
| 2 | Canonical — кириллица | index.html | Высокая |
| 3 | Canonical — кириллица | vagonmarket.html | Высокая |
| 4 | og:url — кириллица | index.html | Высокая |
| 5 | og:image — кириллица (×2) | index.html, vagonmarket.html | Высокая |
| 6 | .htaccess отсутствует | — | Средняя |

**Сводка:**
- Пройдено: 11/17 пунктов чеклиста
- Ошибок: 6 (4 критических: canonical + OG на кириллице)
- Замечаний: 3

После исправления ошибок требуется повторная проверка canonical, OG и .htaccess.
