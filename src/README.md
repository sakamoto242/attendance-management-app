# FashionablyLate 環境構築手順

1. **コンテナの起動**
   ```bash
   docker-compose up -d --build
   ```

2. **パッケージのインストールと設定**
   ```bash
   docker-compose exec php composer install
   docker-compose exec php cp .env.example .env
   docker-compose exec php php artisan key:generate
   docker-compose exec php php artisan migrate --seed
   ```

## ER図
![ER図](er-diagram.png)
