# お問い合わせフォーム
## 環境構築
Dockerビルド

 1. git clone git@github.com:nakagawa1573/test_contact-form.git
 2. docker-compose up -d --build

＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.ymlファイルを編集してください。

Laravel環境構築

1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術

 ・PHP7.4.9  
 ・Laravel 8.83.27  
 ・MySQL 8.0

## ER図

![ER](https://raw.githubusercontent.com/nakagawa1573/images/main/contact.drawio.png)

## URL

・開発環境：http://localhost/  
・ユーザー登録ページ：http://localhost/register  
・phpMyAdmin：http://localhost:8080/
