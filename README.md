# test_flea-market  

## 概要  
フリマアプリ風のWebアプリです。  
ユーザーは商品を出品・購入・コメント・いいねすることができます。  

## 機能一覧  
＊ユーザー登録/ログイン/ログアウト  
＊商品一覧表示  
＊商品詳細表示  
＊商品出品(画像アップロード)  
＊いいね機能  
＊コメント機能  
＊マイリスト(いいねした商品一覧)  
＊商品購入機能  
＊購入済み商品に「SOLD」表示  

## 環境構築  
git clone：<https://github.com/Ono329/test_flea-market.git>  
cd test_frea-market  
docker-compose up -d --build  

## Larvel環境構築  
docker-compose exec php bash   
composer install   
cp .env.example .env   
php artisan key:generate   
php artisan migrate   
php artisan db:seed  

## ストレージリンク  
php artisan storage:link  

## 開発環境  
＊トップページ：<http://localhost/>  
＊会員登録画面：<http://localhost/register>  
＊ログイン画面：<http://localhost/login>  
＊phpMyAdmin：<http://localhost:8080/>  

## 使用技術  
＊PHP 8.5.3 (cli)  
＊Laravel Framework 8.83.29  
＊MySQL 8.0  
＊nginx 1.29.6  

<img width="703" height="683" alt="ER図 2026-03-27 21 40 30" src="https://github.com/user-attachments/assets/1b0c253c-d883-4096-bcf1-6ad9f9cd6aa5" />


