**前端菜单**

##前题
- 已经安装权限扩展包
```
composer require jncinet/laravel-role
```
##安装扩展包
```
composer require jncinet/laravel-menu
```
###在根目录命令行中执行下方命令，创建数据库表
```
php artisan migrate
```
###后台菜单
/menu/menus
###接口
get /menu/menus?uri={添加菜单时设置的标识}