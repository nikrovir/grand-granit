# Grand Granit

## Установка
Установка проекта:
```bash
./app-install.sh example
```

Создание алиаса для Sail:
```bash
alias sail="./vendor/bin/sail"
```

Запуск:
```bash
sail up -d
```

Генерация ключа:
```bash
sail artisan key:generate
```

Миграции и наполнение тестовым контентом:
```bash
sail artisan migrate:fresh --seed
```