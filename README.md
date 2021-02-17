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
