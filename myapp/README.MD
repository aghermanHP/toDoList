###ToDoList technic task for Onnest interview 

@It is a dockerized project, based on symfony and API Platform.

####steps to start the project:
1. run `docker-compose up -d` inside the directory of the app.
2. enter in the app container `docker-compose exec toDoList bash`
3. enter in myapp directory `cd myapp`
4. run `composer install`
5. prepare Database:
- `bin/console doctrine:database:create --if-not-exists`
- `bin/console doctrine:schema:validate`
- `bin/console doctrine:migration:diff`
- `bin/console doctrine:migration:migrate`
- bin/console doctrine:fixtures:load
6. Open http://0.0.0.0:8000/api

