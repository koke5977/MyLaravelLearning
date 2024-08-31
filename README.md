# プロジェクト名

## 開発環境のセットアップ

このプロジェクトを開発環境で実行するための手順を以下に示します。

### 前提条件

- PHP 8.1以上
- Composer
- Node.js と npm
- MySQL

### インストール手順

1. リポジトリをクローン:
```
git clone https://github.com/your-username/your-project.git
cd your-project
```

2. Composerの依存関係をインストール:
```
composer install
```

3. npmパッケージをインストール:
```
npm install
```

4. .envファイルをコピーし、環境設定:
```
cp .env.example .env
```
`.env`ファイルを開き、データベース接続情報など必要な設定を行ってください。

5. アプリケーションキーを生成:
```
php artisan key:generate
```

### 開発サーバーの起動

1. Laravelの開発サーバーを起動:
```
php artisan serve
```

2. 別のターミナルウィンドウで、Vite開発サーバーを起動:
```
npm run dev
```

### データベースの初期化

データベースを初期化し、テストデータを投入するには以下のコマンドを実行:
```
php artisan migrate:fresh --seed
```

### アクセス

ブラウザで `http://localhost:8000` にアクセスして、アプリケーションが正常に動作していることを確認してください。