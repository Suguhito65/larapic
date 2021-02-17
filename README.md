# データベース設計

![](https://i.gyazo.com/dee427a45814795918c37aa4e2621a0f.png)

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
