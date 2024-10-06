2024/10/06 first commit


# 初期構築コマンド
- Laravel sailのインストール

``curl -s "https://laravel.build/the-21st-century" | bash``
※30~40分かかる

- Sailを使ってDockerコンテナを起動
``cd the-21st-century/``
``./vendor/bin/sail up -d``
※オプション -d でバックグラウンドで実行されていることになる

- .envのポート番号を変更
.envにポート番号を指定する。(理由：他のポート番号と8000が重複しているため、他のポート番号を指定する)
APP_PORT=8085

- マイグレーションを実行
``./vendor/bin/sail artisan migrate``
※マイグレーションを未実施の場合、下記のエラーが表示される。
``SQLSTATE[42S02]: Base table or view not found: 1146 Table 'laravel.sessions' doesn't exist (Connection: mysql, SQL: select * from `sessions` where `id` = HNvVANYnMjcln0wtmeePubgC2m2JA1hk4VUiVOIy limit ``


