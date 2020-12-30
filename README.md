<h1 align="center">前端菜单</h1>

## 安装

```shell
$ composer require jncinet/qihucms-menu
```

## 使用

### 数据迁移
```shell
$ php artisan migrate
```

### 发布资源
```shell
$ php artisan vendor:publish --provider="Qihucms\Menu\MenuServiceProvider"
```

## 后台菜单
+ 前端菜单 `menu/menus`

### 路由能参数说明

#### 礼物列表

```php
route('api.menu.index')
请求：GET
地址：/menu/menus?uri={添加菜单时设置的标识，可选}
参数：
int          $pay_type_id      （选填）支付货币类型
int          $exchange_type_id （选填）兑换货币类型
string       $name             （选填）根据礼物名模糊查询
int          $page             （选填）页码
int          $limit            （选填）每页显示的条数
返回值：
[
    {
        id：1,
        uri：'标识'
        block：块标识
        title：名称
        icon：图标
        url：链接地址
        sort：排序
        show_title: true, // 是否显示名称,
        show_icon: true, // 是否显示图标,
        show_h5: true, // H5端是否显示,
        show_mini_app: true, // 小程序端是否显示,
        show_app: true, // APP端是否显示,
    },
    ...
]
```

## 数据库
### 菜单表：menus
| Field             | Type      | Length    | AllowNull | Default   | Comment   |
| :----             | :----     | :----     | :----     | :----     | :----     |
| id                | bigint    |           |           |           |           |
| uri               | varchar   | 56        |           |           | 标识       |
| block             | varchar   | 56        | Y         | NULL      | 块标识     |
| sort              | int       |           |           | 0         | 排序       |
| title             | varchar   | 50        | Y         | NULL      | 名称       |
| icon              | varchar   |           | Y         | NULL      | 图标       |
| url               | varchar   |           | Y         | NULL      | 链接       |
| show_title        | tinyint   |           |           | 1         | 是否显示文字 |
| show_icon         | tinyint   |           |           | 1         | 是否显示图标 |
| show_h5           | tinyint   |           |           | 1         | H5端是否显示 |
| show_mini_app     | tinyint   |           |           | 1         | 小程序是否显示 |
| show_app          | tinyint   |           |           | 1         | APP是否显示  |
| permission        | varchar   | 255       | Y         | NULL      | 权限      |
| created_at        | timestamp |           | Y         | NULL      | 创建时间   |
| updated_at        | timestamp |           | Y         | NULL      | 更新时间   |
