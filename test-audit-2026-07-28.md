# 🧪 Аудит перед деплоем — 2026-07-28

**Сайт:** https://проф-логист.рф  
**Репозиторий:** `/home/openclaw/.openclaw/workspace/logistics-site/`

**Проверку выполнил:** 🧪 Агент-тестировщик

---

## 🔴 Critical (найдено и ИСПРАВЛЕНО)

### 1. Отсутствуют CSS-стили для секций transit-kz и consolidation-wh

**Чек-лист:** SVG-схемы → Стрелки попадают в блоки  
**Файл:** `css/style.css`, `css/style.min.css`

**Проблема:** В `index.html` используется 51 CSS-класс для секций транзита через Казахстан (`transit-kz__*`) и консолидированного склада (`consolidation-wh__*`), но ни один из них **не был определён** в CSS-файлах. Классы упомянуты в CHANGES.md как "добавленные", но фактически отсутствовали.

**Список отсутствовавших классов:**
- `transit-kz`, `transit-kz__bg`, `transit-kz__content`, `transit-kz__route`, `transit-kz__stop`, `transit-kz__stop-icon`, `transit-kz__stop-icon--border`, `transit-kz__stop-icon--final`, `transit-kz__stop-label`, `transit-kz__stop-name`, `transit-kz__stop-detail`, `transit-kz__badge`, `transit-kz__connector`, `transit-kz__connector-line`, `transit-kz__connector-icon`, `transit-kz__info`, `transit-kz__text`, `transit-kz__bullets`, `transit-kz__bullet-icon`, `transit-kz__cta-row`, `transit-kz__metric`, `transit-kz__metric-value`, `transit-kz__metric-unit`, `transit-kz__metric-label`
- `consolidation-wh`, `consolidation-wh__grid`, `consolidation-wh__diagram`, `consolidation-wh__diagram-bg`, `consolidation-wh__flow`, `consolidation-wh__flow--top-left`, `consolidation-wh__flow--top-center`, `consolidation-wh__flow--top-right`, `consolidation-wh__flow--bottom`, `consolidation-wh__flow-icon`, `consolidation-wh__flow-icon--out`, `consolidation-wh__flow-label`, `consolidation-wh__arrows`, `consolidation-wh__hub`, `consolidation-wh__hub-glow`, `consolidation-wh__hub-icon`, `consolidation-wh__hub-title`, `consolidation-wh__hub-subtitle`, `consolidation-wh__info`, `consolidation-wh__text`, `consolidation-wh__bullets`, `consolidation-wh__bullet-marker`, `consolidation-wh__economy`, `consolidation-wh__economy-value`, `consolidation-wh__economy-label`, `consolidation-wh__economy-text`

**Последствия без стилей:** Обе секции отображались бы как неоформленный HTML-поток:
- Маршрут транзита (Китай → Казахстан → Россия) — без сетки, карточек, соединительных линий
- Схема склада-хаба — без позиционирования блоков поставщиков, хаба, стрелок SVG
- Никакой анимации, цветов, отступов

**Исправление:** Добавлены полные стили для всех 51 класса в `css/style.css` (блоки `/* ========== TRANSIT VIA KAZAKHSTAN (MISSING STYLES) ========== */` и `/* ========== CONSOLIDATION WAREHOUSE (MISSING STYLES) ========== */`) с соответствующими медиа-запросами для адаптивности. `css/style.min.css` пересобран.

**Приоритет:** CRITICAL — сайт не работает без этих стилей.

---

## 🟡 Major (найдено, требуется внимание)

### 1. На страницах-гайдах нет выпадающего меню «Города доставки»

**Чек-лист:** Меню → Пункт есть в навигации  
**Файлы:** `guide-dostavka-iz-kitaya.html`, `guide-import-iz-kitaya.html`, `guide-sborniy-gruz.html`

**Проблема:** На главной странице (`index.html`) пункт «Города доставки» добавлен в меню. Однако на страницах-гайдах — старое меню (Главная / Услуги / VagonMarket / Контакты) без городов. Поисковые роботы могут зайти на гайды и не получить ссылки на городские страницы.

**Рекомендация:** Добавить пункт «Города доставки» с выпадающим списком во все страницы сайта, включая гайды.

**Статус:** НЕ ИСПРАВЛЕНО (задача была только про index.html)

---

## 🟢 Minor (замечено)

### 1. robots.txt использует кириллический домен, sitemap.xml — punycode

**Файлы:** `robots.txt`, `sitemap.xml`

- `robots.txt`: `Sitemap: https://проф-логист.рф/sitemap.xml` (читаемый)
- `sitemap.xml`: `<loc>https://xn----8sbq4agjnli4d.xn--p1ai/...</loc>` (punycode)

Оба варианта валидны, несоответствие не является ошибкой — поисковые системы понимают оба формата.

---

## ✅ ПРОВЕРКИ, КОТОРЫЕ ПРОЙДЕНЫ

### 1. Меню
- ✅ Пункт «Города доставки» присутствует в навигации `index.html`
- ✅ Выпадающий список содержит 5 городов: Москва, СПб, Новосибирск, Красноярск, Екатеринбург
- ✅ На десктопе hover-открытие через CSS (`.nav__item--dropdown:hover .nav__dropdown`)
- ✅ На мобильных (≤768px) открытие по клику через JS
- ✅ Не ломает остальное меню — гамбургер работает, закрытие по Escape и клику вне меню
- ✅ Все 5 ссылок в меню ведут на правильные URL

### 2. SVG-схемы (после исправления CSS)
- ✅ Схема склада-хаба (consolidation-wh): все 4 стрелки (3 входящих + 1 исходящая) имеют корректные координаты, `preserveAspectRatio="none"` для растяжения
- ✅ Схема транзита (transit-kz): соединительные линии между точками маршрута отцентрированы

### 3. Ссылки
- ✅ Все 5 городских страниц существуют и имеют корректный HTML
- ✅ В контенте есть текстовые ссылки на все 5 городов (в секции «Ж/Д перевозка» и «Транзит через Казахстан»)
- ✅ Каждая городская страница содержит правильный канонический URL и микроразметку

### 4. sitemap.xml
- ✅ Содержит 11 URL: главная, vagonmarket, 6 городских страниц (включая Владивосток), 3 гайда
- ✅ Приоритеты расставлены (1.0 / 0.8 / 0.7)
- ✅ Даты обновления актуальны

### 5. robots.txt
- ✅ `Allow: /` — все страницы доступны для индексации
- ✅ Нет директив Disallow
- ✅ Sitemap указан

### 6. Валидность HTML
- ✅ Все теги корректно сбалансированы
- ✅ Нет незакрытых тегов
- ✅ Микроразметка JSON-LD (LocalBusiness, FAQPage, HowTo, BreadcrumbList, Product) корректна

### 7. Прочее
- ✅ CSS-переменные и BEM-нотация соблюдены
- ✅ Минифицированные версии CSS и JS обновлены
- ✅ Адаптивность до 480px настроена

---

## 🔧 Что было исправлено в ходе проверки

| Файл | Изменение |
|------|-----------|
| `css/style.css` | Добавлены ~200 строк CSS для `transit-kz` и `consolidation-wh` секций |
| `css/style.min.css` | Пересобрана минификация (29021 символ) |
| `js/script.min.js` | Пересобрана минификация (7038 символов) |

---

## 📋 Итог

**ПРОВЕРКА ПРОЙДЕНА**

Найдена 1 критическая проблема (отсутствие CSS для 2 секций — исправлено).  
Найдена 1 major-проблема (меню городов на гайдах — требуется доработка, но не блокирует деплой).  
Все остальные проверки пройдены успешно.

**Статус:** ✅ **Можно деплоить после проверки гайд-страниц.**
