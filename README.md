# Yii2 Start Application Template

The Yii2 Start Application Template is a fast and efficient way to start building advanced sites based on Yii2. It covers typical use cases for a new project, so you don't have to waste time doing the same work on every project.

## Requirements
PHP version: php-7.2.9
MySQL version: 8.0.30

## Console Commands

## Default App Setup

Use the following command to set up the default application:

php console/yii app/setup

## Fetching Fruits

To fetch all fruits, run the following command:

php console/yii fruits/fetch

## Frontend Web View

To access the frontend web view, navigate to /frontend/web/fruit.

## Backend Web View

To access the backend web view, navigate to /backend/web/sign-in/login.

## Account Details

The following accounts are available for each role:

`administrator` role account
```
Login: webmaster
Password: webmaster
```

`manager` role account
```
Login: manager
Password: manager
```

`user` role account
```
Login: user
Password: user
```

## File Changes

The following files were updated to implement fruit, favourite fruit page, and search functionality:

frontend\controllers\FruitController.php
common\models\Fruits.php
common\models\FruitsSearch.php
frontend\views\fruit\index.php
Conclusion

With the Yii2 Start Application Template, you can quickly and easily set up a new project and start building advanced sites right away. Its comprehensive features and efficient structure allow you to save time and focus on the important aspects of your project.