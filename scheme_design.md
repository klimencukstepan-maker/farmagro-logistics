# Спецификация дизайна: Схема склада-хаба (консолидация)

**Файл:** `#consolidation-wh` — секция на странице проф-логист.рф
**Назначение:** Визуальная схема Y-образного слияния грузов от 3 поставщиков в консолидированный склад-хаб и далее одной партией в РФ.
**Подход:** Чистый Flexbox (без `position: absolute` для узлов). SVG-стрелки встраиваются как inline SVG между flex-узлами.
**Основа:** `kz-consolidation-design.html` (утверждённый прототип) с доработками в flexbox-стилистике.

---

## 1. CSS-переменные проекта (из `:root`)

| Переменная            | Значение    | Применение                        |
|-----------------------|-------------|-----------------------------------|
| `--primary`           | `#0a1628`   | Фон секции                        |
| `--primary-light`     | `#121f3d`   | Фон карточки diagram, альт.фон    |
| `--primary-lighter`   | `#1a2d52`   | Фон хаба, hover-фон               |
| `--gold`              | `#c9a84c`   | Акцент, обводки, текст            |
| `--gold-light`        | `#e2c76a`   | Свечение, градиенты               |
| `--gold-dark`         | `#a8882e`   | Тени, тёмный акцент               |
| `--white`             | `#ffffff`   | Белый текст (заголовки)           |
| `--text`              | `#c8d0dc`   | Основной текст                    |
| `--text-light`        | `#8a96a8`   | Второстепенный текст              |
| `--bg-card`           | `#0f1e36`   | Фон карточки схемы                |
| `--bg-card-hover`     | `#152a48`   | Hover карточки буллета            |
| `--border`            | `#1e3550`   | Рамки карточек                    |
| `--radius`            | `16px`      | Радиус у хаба / карточки          |
| `--radius-sm`         | `10px`      | Радиус у узлов поставщиков        |
| `--transition`        | `0.35s cubic-bezier(0.4, 0, 0.2, 1)` | Все hover/анимации |
| `--font`              | `'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif` | Основной шрифт |
| `--font-display`      | `'Playfair Display', serif` | Заголовки хабов |
| `--max-width`         | `1200px`    | Ширина контейнера                 |

---

## 2. Структура секции

```
<section class="consolidation-wh section" id="consolidation-wh">
  <div class="container">
    <div class="section__header reveal">            ← шапка (как на всём сайте)
    <div class="consolidation-wh__grid reveal">     ← grid 2 колонки: схема | текст
      <div class="consolidation-wh__diagram">       ← flexbox-схема склада
      <div class="consolidation-wh__info">          ← текстовый блок с буллетами
    </div>
  </div>
</section>
```

### 2.1 Параметры секции

```css
.consolidation-wh {
  background: var(--primary);           /* #0a1628 */
  position: relative;
  border-bottom: 1px solid var(--border);  /* 1px solid #1e3550 */
}
```

### 2.2 Grid-обёртка `.consolidation-wh__grid`

```css
.consolidation-wh__grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: center;
}
```

---

## 3. Flexbox-схема склада `.consolidation-wh__diagram`

### 3.1 Общие параметры

```css
.consolidation-wh__diagram {
  position: relative;                    /* контейнер для ::before / подсветок */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 0;                               /* управляем через внутренние margin/padding */
  width: 100%;
  padding: 40px 20px;
  background: var(--bg-card);           /* #0f1e36 */
  border: 1px solid var(--border);      /* #1e3550 */
  border-radius: var(--radius);         /* 16px */
  overflow: hidden;
}
```

### 3.2 Слой подсветки (декоративный ::before)

```css
.consolidation-wh__diagram-bg {
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 55%, rgba(201, 168, 78, 0.06), transparent 70%);
  pointer-events: none;
}
```

### 3.3 Верхний ряд: 3 узла поставщиков

Располагаются в flex-строке:

```
[Поставщик 1] ——— [Поставщик 2] ——— [Поставщик 3]
```

#### HTML-схема верхнего ряда

```html
<div class="consolidation-wh__top-row">
  <!-- Узел 1 -->
  <div class="consolidation-wh__node">
    <div class="consolidation-wh__node-icon">
      <svg truck-icon />  <!-- 20×20 -->
    </div>
    <span class="consolidation-wh__node-label">Китай Поставщик 1</span>
  </div>
  <!-- Разделитель + стрелка -->
  <div class="consolidation-wh__gap">
    <div class="consolidation-wh__gap-line"></div>
    <svg class="consolidation-wh__gap-arrow" chevrons-right />
  </div>
  <!-- Узел 2 -->
  <div class="consolidation-wh__node">
    ...
  </div>
  <div class="consolidation-wh__gap">...</div>
  <!-- Узел 3 -->
  <div class="consolidation-wh__node">
    ...
  </div>
</div>
```

#### Стили верхнего ряда

```css
.consolidation-wh__top-row {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0;
  width: 100%;
  z-index: 2;
  margin-bottom: 0;
}
```

#### Стили узла (поставщик)

```css
.consolidation-wh__node {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  padding: 10px 14px;
  width: 108px;
}

.consolidation-wh__node-icon {
  width: 38px;
  height: 38px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: rgba(201, 168, 78, 0.08);
  border: 1px solid rgba(201, 168, 78, 0.2);
  transition: var(--transition);
}

.consolidation-wh__node:hover .consolidation-wh__node-icon {
  border-color: var(--gold);
  box-shadow: 0 0 16px rgba(201, 168, 78, 0.15);
  background: rgba(201, 168, 78, 0.12);
  transform: translateY(-2px);
}

.consolidation-wh__node-label {
  font-size: 0.7rem;
  color: var(--text-light);
  font-weight: 500;
  white-space: nowrap;
  text-align: center;
}
```

#### Стили разделителя между узлами

```css
.consolidation-wh__gap {
  position: relative;
  width: 48px;
  height: 2px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 28px;  /* компенсация высоты нижнего узла */
}

.consolidation-wh__gap-line {
  width: 100%;
  height: 2px;
  background: linear-gradient(
    90deg,
    rgba(201, 168, 78, 0.1) 0%,
    rgba(201, 168, 78, 0.35) 50%,
    rgba(201, 168, 78, 0.1) 100%
  );
}

.consolidation-wh__gap-arrow {
  position: absolute;
  right: -2px;
  width: 16px;
  height: 16px;
  opacity: 0.45;
}
```

---

### 3.4 Y-образное слияние: стрелки схода

Между верхним рядом и хабом располагается flex-контейнер для линий слияния:

```
     Поставщик 1    Поставщик 2    Поставщик 3
          \              |              /
           \             |             /
            \            |            /
             ---  Склад-хаб  ----
```

#### HTML

```html
<div class="consolidation-wh__merge-area">
  <div class="consolidation-wh__merge-row">
    <div class="consolidation-wh__merge-side">
      <div class="consolidation-wh__merge-line"></div>
    </div>
    <div class="consolidation-wh__merge-center">
      <div class="consolidation-wh__merge-line"></div>
    </div>
    <div class="consolidation-wh__merge-side">
      <div class="consolidation-wh__merge-line"></div>
    </div>
  </div>
  <div class="consolidation-wh__merge-down">
    <div class="consolidation-wh__merge-down-arrow">
      <svg chevrons-down />
    </div>
  </div>
</div>
```

#### Стили

```css
.consolidation-wh__merge-area {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 85%;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.consolidation-wh__merge-row {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  width: 100%;
  height: 28px;
}

.consolidation-wh__merge-side {
  flex: 1;
  position: relative;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.consolidation-wh__merge-side:first-child {
  align-items: flex-end;
  padding-right: 4px;
}

.consolidation-wh__merge-side:last-child {
  align-items: flex-start;
  padding-left: 4px;
}

.consolidation-wh__merge-center {
  width: 2px;
  height: 100%;
  display: flex;
  align-items: flex-start;
  justify-content: center;
}

.consolidation-wh__merge-line {
  height: 50%;
  width: 2px;
  background: rgba(201, 168, 78, 0.3);
}

.consolidation-wh__merge-side .consolidation-wh__merge-line {
  width: 80%;
  height: 2px;
  margin-top: 0;
}

.consolidation-wh__merge-side:first-child .consolidation-wh__merge-line {
  background: linear-gradient(90deg, rgba(201, 168, 78, 0.4), rgba(201, 168, 78, 0.1));
}

.consolidation-wh__merge-side:last-child .consolidation-wh__merge-line {
  background: linear-gradient(90deg, rgba(201, 168, 78, 0.1), rgba(201, 168, 78, 0.4));
}

.consolidation-wh__merge-down {
  width: 2px;
  height: 20px;
  background: linear-gradient(to bottom, rgba(201, 168, 78, 0.4), rgba(201, 168, 78, 0.3));
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.consolidation-wh__merge-down-arrow {
  position: absolute;
  bottom: -10px;
}
```

> **Вариант 2 (если проще):** Вместо сложной flex-структуры слияния — используется inline SVG `viewBox="0 0 260 40"` с 3 путями (левая стрелка, центр, правая стрелка), вставленный как блок между top-row и hub. Размеры: `width="100%" height="36" preserveAspectRatio="xMidYMid meet"`.

---

### 3.5 Центральный хаб

```css
.consolidation-wh__hub {
  position: relative;
  z-index: 3;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  text-align: center;
  padding: 24px 36px;
  background: linear-gradient(135deg, var(--primary-lighter), var(--primary-light));
  border: 2px solid var(--gold);
  border-radius: var(--radius);
  box-shadow:
    0 4px 24px rgba(201, 168, 78, 0.12),
    inset 0 1px 0 rgba(201, 168, 78, 0.08);
  margin: 4px 0;
}

.consolidation-wh__hub-glow {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 85%;
  height: 85%;
  background: radial-gradient(circle, rgba(201, 168, 78, 0.08), transparent 70%);
  pointer-events: none;
  z-index: -1;
}

.consolidation-wh__hub-icon {
  position: relative;
  z-index: 1;
  margin-bottom: 4px;
}

.consolidation-wh__hub-title {
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--gold);
  font-family: var(--font);
  letter-spacing: 0.3px;
}

.consolidation-wh__hub-subtitle {
  font-size: 0.75rem;
  color: var(--text-light);
  font-weight: 500;
}
```

#### Hover-эффект хаба

```css
.consolidation-wh__hub:hover {
  border-color: var(--gold-light);
  box-shadow:
    0 6px 32px rgba(201, 168, 78, 0.18),
    inset 0 1px 0 rgba(201, 168, 78, 0.12);
  transform: translateY(-2px);
  transition: var(--transition);
}

.consolidation-wh__hub:hover .consolidation-wh__hub-glow {
  opacity: 1;
  background: radial-gradient(circle, rgba(201, 168, 78, 0.12), transparent 70%);
}
```

---

### 3.6 Нижний блок: одна партия → в РФ

```css
.consolidation-wh__bottom {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  padding: 8px 16px;
  background: rgba(201, 168, 78, 0.05);
  border: 1px solid rgba(201, 168, 78, 0.2);
  border-radius: var(--radius-sm);
  margin-top: 4px;
  position: relative;
  z-index: 3;
}

.consolidation-wh__bottom-icon {
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(201, 168, 78, 0.12), rgba(201, 168, 78, 0.18));
  border: 1px solid var(--gold);
}

.consolidation-wh__bottom-icon svg {
  stroke: var(--gold);
}

.consolidation-wh__bottom-label {
  font-size: 0.78rem;
  font-weight: 600;
  color: var(--white);
  white-space: nowrap;
}

.consolidation-wh__bottom:hover {
  border-color: var(--gold);
  background: rgba(201, 168, 78, 0.08);
  transform: translateY(-1px);
  transition: var(--transition);
}
```

---

### 3.7 Стрелка от хаба к нижнему блоку

```css
.consolidation-wh__down-arrow {
  width: 2px;
  height: 22px;
  background: linear-gradient(to bottom, rgba(201, 168, 78, 0.4), rgba(201, 168, 78, 0.6));
  position: relative;
  z-index: 2;
}

.consolidation-wh__down-arrow::after {
  content: '';
  position: absolute;
  bottom: -7px;
  left: 50%;
  transform: translateX(-50%);
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 8px solid rgba(201, 168, 78, 0.6);
}
```

---

## 4. Иконки (SVG)

### 4.1 Иконка поставщика / грузовик (truck)

```html
<svg viewBox="0 0 24 24" width="20" height="20" fill="none"
     stroke="#C9A96E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <rect x="1" y="3" width="15" height="13"/>
  <rect x="16" y="5" width="7" height="11" rx="1"/>
  <circle cx="5.5" cy="18.5" r="2.5"/>
  <circle cx="18.5" cy="18.5" r="2.5"/>
</svg>
```

### 4.2 Иконка хаба / склад (building)

```html
<svg viewBox="0 0 24 24" width="44" height="44" fill="none"
     stroke="#C9A96E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
  <path d="M3 21V9l9-6 9 6v12"/>
  <path d="M9 21v-8h6v8"/>
</svg>
```

### 4.3 Иконка исходящей фуры (truck-combined)

```html
<svg viewBox="0 0 24 24" width="20" height="20" fill="none"
     stroke="#C9A96E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <rect x="1" y="3" width="15" height="13"/>
  <rect x="16" y="5" width="7" height="11" rx="1"/>
  <circle cx="5.5" cy="18.5" r="2.5"/>
  <circle cx="18.5" cy="18.5" r="2.5"/>
</svg>
```

### 4.4 Иконка стрелки вправо (chevrons-right)

```html
<svg viewBox="0 0 24 24" width="16" height="16" fill="none"
     stroke="#C9A96E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <polyline points="13 17 18 12 13 7"/>
  <polyline points="6 17 11 12 6 7"/>
</svg>
```

### 4.5 Иконка галочки / буллет (check)

```html
<svg viewBox="0 0 24 24" width="14" height="14" fill="none"
     stroke="#C9A96E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
  <polyline points="20 6 9 17 4 12"/>
</svg>
```

### 4.6 Иконка стрелки вниз (chevron-down) — для слияния

```html
<svg viewBox="0 0 24 24" width="14" height="14" fill="none"
     stroke="#C9A96E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
  <polyline points="6 9 12 15 18 9"/>
</svg>
```

---

## 5. Полная HTML-сборка схемы

```html
<div class="consolidation-wh__diagram">
  <div class="consolidation-wh__diagram-bg"></div>

  <!-- Верхний ряд: 3 поставщика -->
  <div class="consolidation-wh__top-row">
    <!-- Поставщик 1 -->
    <div class="consolidation-wh__node">
      <div class="consolidation-wh__node-icon"><!-- truck icon --></div>
      <span class="consolidation-wh__node-label">Поставщик 1</span>
    </div>
    <div class="consolidation-wh__gap"><div class="consolidation-wh__gap-line"></div></div>

    <!-- Поставщик 2 -->
    <div class="consolidation-wh__node">
      <div class="consolidation-wh__node-icon"><!-- truck icon --></div>
      <span class="consolidation-wh__node-label">Поставщик 2</span>
    </div>
    <div class="consolidation-wh__gap"><div class="consolidation-wh__gap-line"></div></div>

    <!-- Поставщик 3 -->
    <div class="consolidation-wh__node">
      <div class="consolidation-wh__node-icon"><!-- truck icon --></div>
      <span class="consolidation-wh__node-label">Поставщик 3</span>
    </div>
  </div>

  <!-- Y-образное слияние (SVG-альтернатива) -->
  <svg class="consolidation-wh__arrows" viewBox="0 0 320 40"
       preserveAspectRatio="xMidYMid meet" aria-hidden="true">
    <!-- Левая диагональ -->
    <path d="M50 5 Q80 5 110 20" fill="none" stroke="rgba(201,168,78,0.2)"
          stroke-width="2" stroke-dasharray="4 4"/>
    <polyline points="104,16 110,20 107,25" fill="none"
              stroke="rgba(201,168,78,0.35)" stroke-width="2"/>
    <!-- Центр вертикаль -->
    <line x1="160" y1="5" x2="160" y2="18" stroke="rgba(201,168,78,0.25)"
          stroke-width="2" stroke-dasharray="4 4"/>
    <polyline points="155,13 160,18 165,13" fill="none"
              stroke="rgba(201,168,78,0.4)" stroke-width="2"/>
    <!-- Правая диагональ -->
    <path d="M270 5 Q240 5 210 20" fill="none" stroke="rgba(201,168,78,0.2)"
          stroke-width="2" stroke-dasharray="4 4"/>
    <polyline points="216,16 210,20 213,25" fill="none"
              stroke="rgba(201,168,78,0.35)" stroke-width="2"/>
    <!-- Общий сход к хабу -->
    <line x1="160" y1="22" x2="160" y2="35" stroke="rgba(201,168,78,0.4)"
          stroke-width="2"/>
  </svg>

  <!-- Хаб -->
  <div class="consolidation-wh__hub">
    <div class="consolidation-wh__hub-glow"></div>
    <div class="consolidation-wh__hub-icon"><!-- building icon 44×44 --></div>
    <div class="consolidation-wh__hub-title">Склад-хаб</div>
    <div class="consolidation-wh__hub-subtitle">Казахстан / Киргизия</div>
  </div>

  <!-- Стрелка вниз -->
  <div class="consolidation-wh__down-arrow"></div>

  <!-- Нижний блок: одна партия в РФ -->
  <div class="consolidation-wh__bottom">
    <div class="consolidation-wh__bottom-icon"><!-- truck icon --></div>
    <span class="consolidation-wh__bottom-label">Одна партия → в РФ</span>
  </div>
</div>
```

---

## 6. SVG-стрелки слияния (полная спецификация)

**Размер:** `viewBox="0 0 320 40"`, `width="100%"`, `preserveAspectRatio="xMidYMid meet"`
**Цвета:** все stroke используют `rgba(201, 168, 78, ...)` — золотой с прозрачностью

| Элемент          | Путь / Координаты                 | Стиль                             |
|-----------------|-----------------------------------|-----------------------------------|
| Левая стрелка   | `M45 5 Q85 5 115 20`             | dasharray 4 4, stroke-width 2     |
| Наконечник лев. | `polyline 109,16 115,20 112,25`  | solid, w 2                        |
| Центр вертикаль | `M165 5 L165 18`                 | dasharray 4 4, stroke-width 2     |
| Наконечник центр| `polyline 160,13 165,18 170,13`  | solid, w 2                        |
| Правая стрелка  | `M275 5 Q235 5 205 20`           | dasharray 4 4, stroke-width 2     |
| Наконечник прав.| `polyline 211,16 205,20 208,25`  | solid, w 2                        |
| Сход к хабу     | `M165 22 L165 36`                | solid, w 2, opacity 0.4           |

---

## 7. Текстовый блок (правая колонка)

```css
.consolidation-wh__info {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.consolidation-wh__text {
  font-size: 1rem;
  color: var(--text);
  line-height: 1.7;
}

.consolidation-wh__text strong {
  color: var(--gold);
  font-weight: 600;
}

.consolidation-wh__bullets {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.consolidation-wh__bullets li {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  font-size: 0.92rem;
  color: var(--text);
  line-height: 1.5;
  padding: 14px 18px;
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  transition: var(--transition);
  cursor: default;
}

.consolidation-wh__bullets li:hover {
  border-color: rgba(201, 168, 78, 0.2);
  background: var(--bg-card-hover);
  transform: translateX(4px);
}

.consolidation-wh__bullets li strong {
  color: var(--white);
  font-weight: 600;
}

.consolidation-wh__bullet-marker {
  flex-shrink: 0;
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: rgba(201, 168, 78, 0.1);
  margin-top: 1px;
}
```

### 7.1 Блок экономии

```css
.consolidation-wh__economy {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 2px;
  padding: 20px 24px;
  background: linear-gradient(135deg, rgba(201, 168, 78, 0.08), rgba(201, 168, 78, 0.03));
  border: 1px solid rgba(201, 168, 78, 0.2);
  border-radius: var(--radius);
  position: relative;
  overflow: hidden;
}

.consolidation-wh__economy::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 3px;
  height: 100%;
  background: linear-gradient(to bottom, var(--gold), var(--gold-dark));
  border-radius: 2px;
}

.consolidation-wh__economy-value {
  font-size: 2.2rem;
  font-weight: 800;
  color: var(--gold);
  font-family: var(--font-display);
  line-height: 1;
}

.consolidation-wh__economy-label {
  font-size: 1rem;
  font-weight: 600;
  color: var(--white);
}

.consolidation-wh__economy-text {
  font-size: 0.82rem;
  color: var(--text-light);
  margin-top: 2px;
}
```

---

## 8. Анимации

### 8.1 FadeInUp для `.reveal`

```css
.reveal {
  opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.7s ease-out, transform 0.7s ease-out;
}

.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}
```

### 8.2 Задержки для элементов схемы (при появлении)

| Элемент                          | Задержка |
|----------------------------------|----------|
| `.consolidation-wh__node` (3 шт)| 0ms      |
| `.consolidation-wh__arrows`     | 150ms    |
| `.consolidation-wh__hub`        | 250ms    |
| `.consolidation-wh__bottom`     | 350ms    |
| `.consolidation-wh__bullets li` | 150ms каждый по очереди (stagger) |

```css
/* JS добавляет класс .visible с соответствующей задержкой */
.consolidation-wh__node:nth-child(1) { transition-delay: 0ms; }
.consolidation-wh__node:nth-child(3) { transition-delay: 0ms; }
.consolidation-wh__node:nth-child(5) { transition-delay: 0ms; }
.consolidation-wh__arrows { transition-delay: 150ms; }
.consolidation-wh__hub { transition-delay: 250ms; }
.consolidation-wh__bottom { transition-delay: 350ms; }

.consolidation-wh__bullets li:nth-child(1) { transition-delay: 100ms; }
.consolidation-wh__bullets li:nth-child(2) { transition-delay: 200ms; }
.consolidation-wh__bullets li:nth-child(3) { transition-delay: 300ms; }
```

### 8.3 Пульсация хаба

```css
@keyframes hubGlowPulse {
  0%, 100% { box-shadow: 0 4px 24px rgba(201, 168, 78, 0.12); }
  50% { box-shadow: 0 4px 32px rgba(201, 168, 78, 0.22); }
}

.consolidation-wh__hub {
  animation: hubGlowPulse 3s ease-in-out infinite;
}
```

---

## 9. Состояния hover (сводная таблица)

| Элемент                     | Эффект                                              | transition |
|-----------------------------|-----------------------------------------------------|------------|
| `.consolidation-wh__node-icon` | `border-color: var(--gold)`, `box-shadow`, `translateY(-2px)`, фон ярче | var(--transition) |
| `.consolidation-wh__hub`    | `border-color: var(--gold-light)`, `shadow` увеличен, `translateY(-2px)` | var(--transition) |
| `.consolidation-wh__bottom` | `border-color: var(--gold)`, фон ярче, `translateY(-1px)` | var(--transition) |
| `.consolidation-wh__bullets li` | `border-color: rgba(201,168,78,0.2)`, фон `bg-card-hover`, `translateX(4px)` | var(--transition) |

---

## 10. Мобильная адаптация

### 10.1 Брейкпоинт ≤ 768px (планшеты)

```css
@media (max-width: 768px) {
  /* Переключаем grid на одну колонку */
  .consolidation-wh__grid {
    grid-template-columns: 1fr;
    gap: 36px;
  }

  /* Схема занимает всю ширину */
  .consolidation-wh__diagram {
    padding: 32px 16px;
    min-height: 280px;
  }

  /* Узлы поставщиков */
  .consolidation-wh__node {
    width: 88px;
    padding: 8px 10px;
  }

  .consolidation-wh__node-icon {
    width: 32px;
    height: 32px;
  }

  .consolidation-wh__node-icon svg {
    width: 17px;
    height: 17px;
  }

  .consolidation-wh__node-label {
    font-size: 0.62rem;
  }

  /* Разделители */
  .consolidation-wh__gap {
    width: 28px;
  }

  /* Хаб */
  .consolidation-wh__hub {
    padding: 18px 24px;
  }

  .consolidation-wh__hub-icon svg {
    width: 36px;
    height: 36px;
  }

  .consolidation-wh__hub-title {
    font-size: 1rem;
  }

  .consolidation-wh__hub-subtitle {
    font-size: 0.68rem;
  }

  /* Нижний блок */
  .consolidation-wh__bottom {
    padding: 6px 14px;
  }

  .consolidation-wh__bottom-icon {
    width: 30px;
    height: 30px;
  }

  .consolidation-wh__bottom-label {
    font-size: 0.7rem;
  }

  /* SVG arrows */
  .consolidation-wh__arrows {
    max-height: 30px;
  }

  /* Текстовый блок */
  .consolidation-wh__economy-value {
    font-size: 1.9rem;
  }
}
```

### 10.2 Брейкпоинт ≤ 480px (телефоны)

```css
@media (max-width: 480px) {
  .consolidation-wh__grid {
    gap: 28px;
  }

  .consolidation-wh__diagram {
    padding: 24px 12px;
    min-height: 240px;
  }

  /* Узлы поставщиков — уменьшаем */
  .consolidation-wh__top-row {
    gap: 0;
  }

  .consolidation-wh__node {
    width: 72px;
    padding: 6px 6px;
    gap: 5px;
  }

  .consolidation-wh__node-icon {
    width: 28px;
    height: 28px;
  }

  .consolidation-wh__node-icon svg {
    width: 15px;
    height: 15px;
  }

  .consolidation-wh__node-label {
    font-size: 0.55rem;
  }

  .consolidation-wh__gap {
    width: 18px;
  }

  /* Хаб */
  .consolidation-wh__hub {
    padding: 14px 20px;
    gap: 4px;
  }

  .consolidation-wh__hub-icon svg {
    width: 30px;
    height: 30px;
  }

  .consolidation-wh__hub-title {
    font-size: 0.85rem;
  }

  .consolidation-wh__hub-subtitle {
    font-size: 0.62rem;
  }

  /* SVG arrows */
  .consolidation-wh__arrows {
    max-height: 24px;
  }

  /* Нижний блок */
  .consolidation-wh__bottom {
    padding: 5px 12px;
    gap: 4px;
  }

  .consolidation-wh__bottom-icon {
    width: 26px;
    height: 26px;
  }

  .consolidation-wh__bottom-icon svg {
    width: 15px;
    height: 15px;
  }

  .consolidation-wh__bottom-label {
    font-size: 0.62rem;
  }

  /* Текстовый блок */
  .consolidation-wh__economy {
    padding: 16px 18px;
  }

  .consolidation-wh__economy-value {
    font-size: 1.6rem;
  }

  .consolidation-wh__economy-label {
    font-size: 0.88rem;
  }

  .consolidation-wh__economy-text {
    font-size: 0.75rem;
  }
}
```

---

## 11. Размерная сетка (desktop-first)

| Элемент                     | Размер (px)       | Отступы/Расстояние            |
|-----------------------------|-------------------|-------------------------------|
| Секция padding              | 100px 0           | —                             |
| Diagram padding             | 40px 20px         | —                             |
| Узел поставщика             | 108px × ~70px     | gap 8px между иконкой и лейблом |
| Иконка узла                 | 38×38 (border-radius 50%) | —                         |
| Разделитель gap             | 48px × 2px        | margin-bottom 28px            |
| SVG слияния                 | 100% × 36px       | —                             |
| Хаб                         | auto × ~110px     | padding 24px 36px; gap 6px    |
| Хаб-иконка                  | 44×44             | margin-bottom 4px             |
| Стрелка вниз                | 2px × 22px        | —                             |
| Нижний блок                 | auto × ~52px      | padding 8px 16px; gap 6px     |
| Буллеты                     | —                 | gap 14px; padding 14px 18px   |
| Буллет-маркер               | 24×24             | margin-top 1px                |
| Блок экономии               | —                 | padding 20px 24px             |
| Значение экономии           | 2.2rem            | line-height 1                 |
| CTA кнопка                  | —                 | как `.btn--primary` на сайте   |

---

## 12. Типографика

| Элемент                    | Шрифт                         | Размер       | Цвет            | Weight |
|----------------------------|-------------------------------|--------------|-----------------|--------|
| Заголовок секции            | Playfair Display              | clamp(1.8rem, 4vw, 2.8rem) | var(--white) | 600    |
| Подзаголовок секции         | Inter                         | 1.05rem      | var(--text-light) | 400    |
| Имя поставщика (лейбл)     | Inter                         | 0.7rem       | var(--text-light) | 500    |
| Название хаба              | Inter                         | 1.15rem      | var(--gold)     | 700    |
| Сабтайтл хаба              | Inter                         | 0.75rem      | var(--text-light) | 500    |
| Нижний блок лейбл          | Inter                         | 0.78rem      | var(--white)    | 600    |
| Тело текста                | Inter                         | 1rem         | var(--text)     | 400    |
| Strong в тексте            | Inter                         | 1rem         | var(--gold)     | 600    |
| Буллет текст               | Inter                         | 0.92rem      | var(--text)     | 400    |
| Strong в буллете           | Inter                         | 0.92rem      | var(--white)    | 600    |
| Economy value              | Playfair Display              | 2.2rem       | var(--gold)     | 800    |
| Economy label              | Inter                         | 1rem         | var(--white)    | 600    |

---

## 13. Тексты (из `kz-consolidation-texts.json`)

### 13.1 Заголовок секции

```
Консолидированный склад в Казахстане
```

**span.gold:** `в Казахстане`

### 13.2 Подзаголовок

```
Одна партия — одна доставка. Объединяем грузы от разных поставщиков и сокращаем ваши расходы до 30%
```

### 13.3 Текст (абзац)

```
На границе Казахстана и Киргизии у нас собственный консолидированный склад. 
Сюда стекаются грузы от разных поставщиков из Китая, объединяются в одну партию 
и отправляются одной фурой или вагоном в Россию. Вы платите за логистику один раз, 
а не за каждую поставку по отдельности — особенно выгодно для малого и среднего бизнеса.
```

### 13.4 Буллеты

1. **Склад на границе** — грузы из Китая накапливаются в одной точке
2. **Одна партия вместо нескольких** — меньше затрат на доставку
3. **Экономия до 30% на фрахте** за счёт объединения

### 13.5 Блок экономии (выделенный)

```
до 30%
экономия на доставке
при консолидации сборных грузов
```

### 13.6 CTA

```
Рассчитать выгоду
```

---

## 14. Подсветка схемы (референс)

Схема использует **тёмную тему** с золотым акцентом:

- **Фон:** `var(--bg-card)` (#0f1e36) — глубокий тёмно-синий
- **Рамки:** `var(--border)` (#1e3550) либо полупрозрачный золотой `rgba(201, 168, 78, 0.15–0.25)`
- **Золото:** `#C9A96E` для обводок иконок, центрального хаба, стрелок
- **Свечение:** радиальные градиенты `rgba(201, 168, 78, 0.04–0.08)` вокруг хаба
- **Пунктир:** `stroke-dasharray: 4 4` для стрелок схода
- **Иконки:** `stroke="#C9A96E"` (все единый золотой)

---

## 15. Примечания для верстальщика

1. **Без absolute:** Ни один из 3 узлов поставщиков, хаб и нижний блок не используют `position: absolute`. Вся схема строится на flex-контейнерах. Исключение: `svg.consolidation-wh__arrows` может быть `position: absolute` для наложения поверх gap-зоны, либо встраивается как блочный элемент между рядами.

2. **SVG-стрелки:** Рекомендуется inline SVG между `.consolidation-wh__top-row` и `.consolidation-wh__hub` с `viewBox="0 0 320 40"` и `preserveAspectRatio="xMidYMid meet"`, растянутое на 100% ширины.

3. **Единый тегline:** `<span class="section__tagline">Экономия</span>` — теглайн секции.

4. **JS-скролл:** Имя якоря `#consolidation-wh` уже есть в навигации (`<a href="#consolidation-wh">`).

5. **Порядок:** Секция идёт после `#transit-kz`, перед `#summary` (geo-summary).

6. **Анимация:** JS-скрипт добавляет класс `visible` на `.reveal` при появлении в viewport (IntersectionObserver). Внутренние задержки — через `transition-delay`.

7. **Контент навигации:** В навигации пункт называется «Склад в Казахстане» — ведёт на `#consolidation-wh`.

---

*Спецификация подготовлена на основе `kz-consolidation-design.html` (утверждённый прототип) и текущего дизайна сайта проф-логист.рф.*
