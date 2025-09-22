# UNO PIM Extension: YouTube Gallery

Розширення для **UNO PIM**, яке дозволяє контент-менеджерам додавати відео з YouTube та переглядати їх у списку.

## 📦 Функціонал
- Новий пункт меню **YouTube**
- Міграція для зберігання відео (name + url)
- Сторінка з Datagrid, що відображає список доданих відео
- Кнопка **Add Video** для додавання нового відео
- Додавання відео через модальне вікно з двома полями:
    - `name` — назва відео
    - `url` — посилання на YouTube
- Видалення відео можливе безпосередньо у Datagrid
- **Редагування не передбачено**

---

## 🚀 Розгортання проекту

### 1. Встановлення UNO PIM
```bash
git clone https://github.com/unopim/unopim.git
cd unopim
composer install
cp .env.example .env
php artisan key:generate
php artisan unopim:install
php artisan serv
```

UNO PIM має запуститися за адресою:
http://localhost:8000

### 2. Додавання пакета

Перейдіть у ваш репозиторій за адресою
https://github.com/vitkonovaluck/youtube_galery_extention_for_UNO_PIM

Виберіть Code → Download ZIP

На сервері розпакуйте архів прямо у директорію:
```bash 
unzip youtube_galery_extention_for_UNO_PIM.zip -d packages/Extra/
```
В результаті повинно вийти:
```bash
packages/Extra/YouTube/...
```
У composer.json проєкту додайте:
```bash
"autoload": {
  "psr-4": {
    . . . 
    "Extra\\YouTube\\": "packages/Extra/YouTube/src/"
  }
}
```
У config/app.php проєкту додайте:
```bash
    'providers' => ServiceProvider::defaultProviders()->merge([
        . . .
        Extra\YouTube\Providers\YouTubeServiceProvider::class,
    ])->toArray(),
```
Після цього ви просто:
```bash
composer dump-autoload
php artisan migrate
```

І у меню з’явиться пункт YouTube, де можна додавати та переглядати відео.
