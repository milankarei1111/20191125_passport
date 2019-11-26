# OAuth 2.0 passport(密碼模式)

----
## 影片教學
 [laravel6 认证与授权 1]
(https://www.bilibili.com/video/av74879198?p=5)

[laravel6 认证与授权 2 - 使用Scope]
(https://www.bilibili.com/video/av74879198?p=6)


----
## 準備工作
1. .env 資料庫配置
2. 修改資料庫默認字串長度,因應後面套件包產生的表名長度會過長
AppServiceProvider boot() 加入Schema::defaultStringLength(191);

3. php artisan make:request BaseRequest

4. 入口index.php 替換原生Request 為 BaseRequest // request和reponse都是json格式

5. php artisan make:controller PassportController

6. composer require laravel/passport

7. php artisan migrate // 創建表來儲存客戶端和 access_token

8. php artisan passport:install // 生成加密 access_token的key

8. php artisan passport:install // 生成加密 access_token的key

9. Laravel\Passport\HasApiTokens Trait  將此特徵引入App\Usr模型中 // 提供一些輔助函數檢查已認證用戶令牌和使用範圍


----
## 安裝Guzzle套件包
>發送http請求

    composer require guzzlehttp/guzzle

----

## 配置passport認證
>config/auth.php 設定

----

## 配置控制器
> 

----
