### Installation

Run docker
```
docker-compose up -d
```

Create and initialise database
```
docker-compose exec app php app/console doctrine:schema:update --force
docker-compose exec app php app/console doctrine:fixtures:load -n
```

### Access

Access to application (dev) : `localhost:10000/app_dev.php`

Access to phpmyadmin : `localhost:10002/app_dev.php`
