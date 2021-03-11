# アプリケーション名

- Larapic

# URL

- http://larapic.herokuapp.com/

# 開発環境

- PHP 7.2/Laravel 7.3/mySQL 8.0/Docker/Github/Visual Studio Code/Heroku/AWS(S3)

# 使用画面のイメージ

![](https://i.gyazo.com/287297c3169e8c05a3ad287f7a9adcf9.png)

![](https://i.gyazo.com/5fa23d8f610336f1d17709f56a0f264e.png)

# データベース設計

![](https://i.gyazo.com/6c5a8456ef51d80982b7f8a6041fabc1.png)

# テーブル設計

## Users テーブル

| Column    | Type      | Options        |
| --------- | --------- | -------------- |
| id        | INT       | auto_increment |
| name      | VARCHAR   |                |
| email     | VARCHAR   |                |
| password  | VARCHAR   |                |
| create_at | TIMESTAMP |                |
| update_at | TIMESTAMP |                |

## Posts テーブル

| Column    | Type      | Options        |
| --------- | --------- | -------------- |
| id        | INT       | auto_increment |
| user_id   | INT       |                |
| body      | VARCHAR   |                |
| create_at | TIMESTAMP |                |
| update_at | TIMESTAMP |                |

## Likes テーブル

| Column    | Type      | Options |
| --------- | --------- | ------- |
| post_id   | INT       |         |
| user_id   | INT       |         |
