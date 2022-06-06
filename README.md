# Requisitos / instalação / Comandos

## Requisitos instalação

* ### Windows

  * Docker
    * Link de download: [https://desktop.docker.com/win/stable/amd64/Docker%20Desktop%20Installer.exe](https://desktop.docker.com/win/stable/amd64/Docker%20Desktop%20Installer.exe)

* ### Linux

  * Docker:
    * Documentação de passo a passo: [https://docs.docker.com/engine/install/ubuntu/](https://docs.docker.com/engine/install/ubuntu/)
  * Docker-compose
    * Documentação de passo a passo: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)

## Comando para executar

Comando para subir e dar build:
```code
docker-compose up -d --build
```

Comando para executar a primeira vez:
```code
docker-compose exec padrao composer install && docker-compose exec padrao php artisan migrate && docker-compose exec padrao php artisan db:seed && docker-compose exec padrao php artisan key:generate
```
Comando para subir e não dar build:

```code
docker-compose up -d
```

Comando para parar:

```code
docker-compose stop
```

´´´code
Comando para remover:

```code
docker-compose down
```

Comando para criar um migrate
```code
docker-compose exec padrao php artisan make:migration Modificacao
```

Comando para rodar o migrate
```code
docker-compose exec padrao php artisan migrate
```

Comando para criar um model
```code
docker-compose exec padrao php artisan make:model Model
```


Comando para criar uma controller
```code
docker-compose exec padrao php artisan make:controller Controller
```
