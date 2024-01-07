## How to run

run

```bash
cd php-backend
```

```bash
composer install
```


after that run:

```bash
docker compose up -d
```


sometimes the scripts in docker-entrypoint-initdb.d dont get executed and in that case you will need to go create a database called `demo`. This can be done via pgadmin. To access this website go to `localhost:5001` and use credentials: `username=admin@admin.com` and `password=admin` after that register a server. Give the server some name (does not matter) and under `connection->Host name/address` paste the output of this command: `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' "$(docker container ls | grep postgres | awk '{print $1}')"`. Don't forget to change the field "user" to `user` and in the field "password" write `admin`.
After that right-click on the server and create database. Only change the field "name" and give it name `demo`.
After that right-click on the created `demo` database and select `Query Tool`. New text area appears in which paste the contents (all of it) of the `db-init.sql` file which is under the `db-init-scripts` directory and in the Query Tool hit the Run button (Execute Script). After that execute the `create-categories.sql` script in the same directory. Now you are all set up and good to go.


# DWS project requirements

### For baseline grade 6 (50.00–59.99%)
(3)
- [x] Reading data from the database and displaying it on the web app (also filtering, sorting...)
- [x] Saving data from web forms to a database
- [ ] Updating data in the database via your web app
- [x] Data deletion via your web app

### For baseline grade 7 (60.00–69.99%)
(2)
- [ ] Using PDO to connect to the database (in the case of using a relational database)
- [x] User authentication (login/logout)
- [x] User registration
- [x] Use of LocalStorage or cookies

### For baseline grade 8 (70.00–79.99%)
(2)
- [ ] File storage and management (in the file system, not in the database)
- [ ] Using AJAX technology
- [x] Secure storage of passwords (at least hash function)
- [ ] Automatic generation of barcodes or QR codes
- [ ] Use of user location data
- [x] Using a source code management system (e.g., Git)

### For baseline grade 9 (80.00–89.99%)
(2)
- [x] Using the jQuery library or any JavaScript framework of your choice
- [ ] Using regular expressions
- [x] Access to the database exclusively via REST calls
- [ ] Using the cURL library
- [ ] Automatic creation of PDF documents

### For baseline grade 10 (90.00–100.00%)
(2)
- [ ] Integration of data from unstructured external web sources (parsing, web scraping)
- [ ] Automated sending of notifications via e-mail (e.g., registration notification)
- [x] Separation of logical sections of the program code (separate frontend and backend components, so that the backend component can also be used for, for example, a mobile application (which, of course, does not need to be prepared))
- [ ] Placing a website on a server accessible online
- [x] Project containerization using Docker

