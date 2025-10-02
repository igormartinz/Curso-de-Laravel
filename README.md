## Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 22

## Sequecia para criar projeto

Criar o projeto com laravel

```
composer create-project laravel/laverel .
```

Inciar o projeto criado com laravel

```
php artisan serve
```

## Como rodar o projeto baixado 

Duplicar o arquivo `.env.example` e renomear para `.env`   

Instalar as dependências do PHP
```
composer install
```

Gerar a chave para o arquivo `.env`.
```
php artisan key:generate
```

Executar as migrantion para criar a base de dados e as tabelas.
```
php artisan migrate
```

