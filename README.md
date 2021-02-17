# データベース設計

![](https://i.gyazo.com/ce1074a68396d2bf5bbe65ab119c8416.png)

# テーブル設計

## Users テーブル

| Column    | Type      | Options        |
| --------- | --------- | -------------- |
| id        | int       | auto_increment |
| name      | VARCHAR   |                |
| email     | VARCHAR   |                |
| password  | VARCHAR   |                |
| create_at | TIMESTAMP |                |
| update_at | TIMESTAMP |                |

## Posts テーブル

| Column    | Type      | Options        |
| --------- | --------- | -------------- |
| id        | int       | auto_increment |
| user_id   | int       |                |
| body      | VARCHAR   |                |
| create_at | TIMESTAMP |                |
| update_at | TIMESTAMP |                |

## Likes テーブル

| Column    | Type      | Options |
| --------- | --------- | ------- |
| post_id   | int       |         |
| user_id   | int       |         |
