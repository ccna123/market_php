# ルービックキューブコレクション
本アプリはルービックキューブ愛好者向けのルービックキューブ収集記録です。ルービックキューブに関する情報を一か所に集めることで、特に初心者にとって、自分が挑戦したいルービックキューブの動画や販売先が探しやすいサイトです。ぜひ、ご活用ください。

「補足」本アプリは試験用のアプリなので、ルービックキューブの種類の数は限られいているので、ご了承ください。今後は、種類の数を増やす予定です。

#  主な機能

-  会員登録
-  ルービックキューブの種類閲覧・ポケット追加・コメント記入
-  特定の商品についての攻略法の動画や販売先へのリンク

#  アプリの使い方
ソースコードを全部ダウンロードして、xammpがインストールされたフォルダーにあるhtdocsフォルダーに入れてください。

xamppのダウンロードリンク　[ダウンロード](https://www.apachefriends.org/jp/index.html)

# .envファイルの設定
ダウンロードしたフォルダーに`.env.example`とういファイルがあります。中身はこんな感じです。

```
GMAIL_USERNAME="your email"
GMAIL_PASSWORD="your email password"
```

これはアプリ内のメール送信の為です。まずは、`.env.example`というファイルの名前を`.env`という名前に変更します。変更したら、中身の内容を自分のメールの情報に修正します。なお、`GMAIL_PASSWORD`はGmailの2段階認証プロセスを通して、発行されたアプリパスワードは`GMAIL_PASSWORD`に該当します。
例えば：
元のファイル：
```
GMAIL_USERNAME="your email"
GMAIL_PASSWORD= "your email password"
```
変更された後のファイル：
```
GMAIL_USERNAME="abc@gmail.com"
GMAIL_PASSWORD= "asdavdq1232"
```

