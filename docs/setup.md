### Follow the below steps to setup the project:

1. Clone the repository using the below command:

```bash
git clone <project url>
```

2. Install the required composer and dependencies using the below command:

```bash
composer install; npm install; npm run dev
```

3. Run the following, create a new database and update the `.env` file with the database credentials.

```bash
cp .env.example .env; php artisan key:generate
```

4. Run the migrations using the below command:

```bash
php artisan migrate --seed
```
