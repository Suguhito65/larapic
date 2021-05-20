# アプリケーション名

- Larapic

# アプリケーションの機能

- ユーザー管理機能。管理人（ユーザーID:1）は他ユーザーの投稿やコメントを編集・削除できますが、管理人以外は自身の投稿やコメント以外は編集・削除できません。

- Googleログイン機能。Googleアカウントでログインできます。テスト用のアカウントも用意しているので、そちらを使って頂いても構いません。

- 投稿機能。メッセージと画像を投稿でき、詳細ページにて投稿の編集・削除ができます。投稿者ごとに投稿を表示する事もできます。

- タグ付け機能。投稿する際、#（半角）を文字の頭につけるとその文字をタグにする事ができます。投稿編集ページにてタグを増やしたり消したりする事ができ、タグごとに投稿を表示する事もできます。

- コメント機能。投稿詳細ページにて投稿にコメントする事ができます。コメントを削除する事もできます。

- あいまい検索機能。投稿をあいまい検索できます。

- いいね機能（非同期）。投稿に対していいねをつけることができます。

# URL

- http://larapic.herokuapp.com/

# テスト用アカウント

- メールアドレス:test@test
- パスワード:testtest

# 開発環境

- macOS Catalina 10.15.7
- PHP 7.2.34
- Laravel 7.30.4
- Bootstrap 4.0.0
- Vue.js 2.5.17
- mySQL 8.0.23
- Google API
- Docker
- Heroku
- AWS S3
- Visual Studio Code
- Github

# 使用画面のイメージ

![](https://i.gyazo.com/b684f36f2f219822a58613ac08ca0881.png)

![](https://i.gyazo.com/113e5d97aa5d17132801624d763d2eee.jpg)

# データベース設計

![](https://i.gyazo.com/2fa13b80d7488edfb02024e782094d8d.png)

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
| image_url | VARCHAR   |                |
| create_at | TIMESTAMP |                |
| update_at | TIMESTAMP |                |

## Comment テーブル

| Column    | Type      | Options |
| --------- | --------- | ------- |
| id        | INT       |         |
| comment   | VARCHAR   |         |
| post_id   | INT       |         |
| user_id   | INT       |         |
| create_at | TIMESTAMP |         |
| update_at | TIMESTAMP |         |

## Likes テーブル

| Column    | Type      | Options |
| --------- | --------- | ------- |
| id        | INT       |         |
| post_id   | INT       |         |
| user_id   | INT       |         |
| create_at | TIMESTAMP |         |
| update_at | TIMESTAMP |         |

## Tags テーブル

| Column    | Type      | Options |
| --------- | --------- | ------- |
| id        | INT       |         |
| tag_name  | VARCHAR   |         |
| create_at | TIMESTAMP |         |
| update_at | TIMESTAMP |         |

## Post_tag テーブル

| Column    | Type      | Options |
| --------- | --------- | ------- |
| id        | INT       |         |
| post_id   | INT       |         |
| tag_id    | INT       |         |
| create_at | TIMESTAMP |         |
| update_at | TIMESTAMP |         |
