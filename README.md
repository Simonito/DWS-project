## How to run

run

`cd php-backend`  
`composer install`


after that run:

`docker compose up -d`


sometimes the scripts in docker-entrypoint-initdb.d dont get executed and in that case you will need to go create a database called `demo`. This can be done via pgadmin. To access this website go to `localhost:5001` and use credentials: `username=admin@admin.com` and `password=admin` after that register a server. Give the server some name (does not matter) and under `connection->Host name/address` paste the output of this command: `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' "$(docker container ls | grep postgres | awk '{print $1}')"`. Don't forget to change the field "user" to `user` and in the field "password" write `admin`.
After that right-click on the server and create database. Only change the field "name" and give it name `demo`.
After that right-click on the created `demo` database and select `Query Tool`. New text area appears in which paste the contents (all of it) of the `db-init.sql` file which is under the `db-init-scripts` directory and in the Query Tool hit the Run button (Execute Script). Now you are all set up and good to go.

