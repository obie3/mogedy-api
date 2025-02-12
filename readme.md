
## Project set up
```
  git clone https://github.com/obie3/mogedy.git
  cd obande-api
  composer install
  cp .env.example .env
  php artisan key:generate
```

Create a database and update the `.env` file with your database credentials.
Next, migrate your database using the following command.
```
  php artisan migrate
```
Start the local server:
```
  php artisan serve
```

All routing are carried out on the `/routes/api.php` file

## Endpoints

#### Create Products
`https://mogedy-v1.herokuapp.com//api/sales/create`
Params

| Key           | Value         | 
| ------------- |:-------------:|
| item         | earpiece    |
| amount         | 10 |

Response:

```bash
  {"message":"Item created successfully!"}
```

#### Create Products
`https://mogedy-v1.herokuapp.com/api/sales/records`

Response:

```bash
  {"message": [ {"id":152,"amount":30,"item":"tutorials","created_at":"2019-07-20 04:19:42","updated_at":"2019-07-20 04:19:42"},{"id":162,"amount":20,"item":"tutorials","created_at":"2019-07-20 04:19:51","updated_at":"2019-07-20 04:19:51"},{"id":172,"amount":10,"item":"tutorials","created_at":"2019-07-20 05:20:32","updated_at":"2019-07-20 05:20:32"},{"id":182,"amount":30,"item":"tutorials","created_at":"2019-07-20 05:21:50","updated_at":"2019-07-20 05:21:50"},{"id":192,"amount":30,"item":"tutorials","created_at":"2019-07-20 05:23:37","updated_at":"2019-07-20 05:23:37"},{"id":202,"amount":30,"item":"tutorials","created_at":"2019-07-20 05:25:08","updated_at":"2019-07-20 05:25:08"},{"id":212,"amount":30,"item":"tutorials","created_at":"2019-07-20 05:26:03","updated_at":"2019-07-20 05:26:03"},{"id":222,"amount":30,"item":"tutorials","created_at":"2019-07-20 05:27:30","updated_at":"2019-07-20 05:27:30"}]}]}
```
