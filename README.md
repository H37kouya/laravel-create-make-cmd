# Laravelのmakeコマンドの例

LaravelでService層を使うとき、makeコマンドがほしいと思ったので、例として作っておいた

## 追加したコマンド

``` shell
php artisan make:service ExampleService

php artisan make:repository ExampleRepository
```

## コマンドについて

### make:service

`php artisan make:service ExampleService`を使うと
ExampleServiceを作る。

### make:repository

`php artisan make:repository ExampleRepository`を使うと
ExampleRepositoryとExampleRepositoryInterfaceを作成する。
