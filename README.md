# XYZ Football API

RESTful API management platfom untuk team XYZ menggunakan Laravel.

## Setup local development

### How to run
1. Change ENV
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=xyz_football
    DB_USERNAME=root
    DB_PASSWORD=
    ```

2. Run migration:

    ```bash
    php artisan migrate
    ```

3. Run seeder:

    ```bash
    php artisan db:seed
    ```

4. Run server:

    ```bash
    php artisan serve
    ```

### Resource

  [<img src="https://run.pstmn.io/button.svg" alt="Run In Postman" style="width: 128px; height: 32px;">](https://app.getpostman.com/run-collection/9005645-405c9393-b54e-43f6-af4f-b5bf344ea3fd?action=collection%2Ffork&source=rip_markdown&collection-url=entityId%3D9005645-405c9393-b54e-43f6-af4f-b5bf344ea3fd%26entityType%3Dcollection%26workspaceId%3Dfc007923-8534-49d7-883e-e3786a5c305a)

- [Documentations](https://www.postman.com/nf-team/public/documentation/nwuzecu/xyz-football-api)
- ./XYZ Football API.postman_collection.json
