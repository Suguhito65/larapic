# データベース設計

![](https://i.gyazo.com/1af486c1bbd2166e41b6fe7e80908e01.png)

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
