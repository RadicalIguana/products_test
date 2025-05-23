# Система управления товарами и заказами

Веб-приложение для управления товарами и заказами, разработанное на Laravel 12.

## Требования

- PHP >= 8.4
- Composer
- Laravel 12

## Установка

1. Клонируйте репозиторий:
```bash
git clone https://github.com/RadicalIguana/products_test.git
cd products-test
```

2. Установите зависимости PHP:
```bash
composer install
```

3. Создайте файл .env:
```bash
cp .env.example .env
```

4. Сгенерируйте ключ приложения:
```bash
php artisan key:generate
```

5. Настройте подключение к базе данных в файле .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Выполните миграции и сидеры:
```bash
php artisan migrate --seed
```

7. Запустите сервер разработки:
```bash
php artisan serve
```

## Функциональность

### Управление товарами

- Просмотр списка товаров
- Добавление новых товаров
- Редактирование существующих товаров
- Удаление товаров
- Просмотр детальной информации о товаре

Каждый товар содержит:
- Название (обязательное)
- Категорию (обязательное)
- Описание
- Цену в рублях с копейками (обязательное)

### Управление заказами

- Просмотр списка заказов
- Создание новых заказов
- Просмотр детальной информации о заказе
- Изменение статуса заказа

Каждый заказ содержит:
- ФИО покупателя (обязательное)
- Товар и количество
- Дату создания (автоматически)
- Статус (новый/выполнен)
- Комментарий

### Категории товаров

Предустановленные категории:
- Легкий
- Хрупкий
- Тяжелый

## Структура базы данных

### Таблица categories
- id (primary key)
- name (string)

### Таблица products
- id (primary key)
- name (string)
- category_id (foreign key)
- description (text, nullable)
- price (decimal)

### Таблица orders
- id (primary key)
- customer_name (string)
- product_id (foreign key)
- quantity (integer)
- status (enum: new, completed)
- comment (text, nullable)
- created_at (timestamp)

## Валидация

Приложение включает валидацию следующих полей:
- Название товара (обязательное)
- Категория товара (обязательное)
- Цена товара (обязательное, числовое)
- ФИО покупателя (обязательное)
- Количество товара (обязательное, минимум 1)

## Технологии

- PHP 8.4
- Laravel 12
- Bootstrap 5
- MySQL
- Git
