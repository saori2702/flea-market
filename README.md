## アプリケーション名
-COACHTECHフリマサイト
## 環境構築
'''
# リポジトリのクローン
git clone git@github.com:saori2702/flea-market.git
# DockerDesktopアプリを立ち上げる
docker-compose up -d --build
docker-compose exec php bash

# --- 以降、コンテナ内での操作 ---
composer install
cp .env.example .env,環境変数を変更

# アプリケーションキーの作成
php artisan key:generate
# マイグレーションの実行
php artisan migrate
# シーディングの実行
php artisan db:seed

## 使用技術(実行環境)
PHP8.1
Laravel8 (Fortifyによる認証実装)
MySQL8.0.26

## URL
[phpMyadmin]http://localhost:8080/
[商品一覧]http://localhost/
[会員登録]http://localhost/register
[ログイン]http://localhost/login
[マイリスト]http://localhost/?tab=mylist
[マイページ]http://localhost/mypage
[プロフィール編集]http://localhost/mypage/profile
[出品]http://localhost/sell

ER図
![ER図](docs/database.drawio.png)
