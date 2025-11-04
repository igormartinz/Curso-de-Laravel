## Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 22

## Sequecia para criar projeto

Criar o projeto com laravel

```
composer create-project laravel/laverel .
```


## Como rodar o projeto baixado 

Duplicar o arquivo `.env.example` e renomear para `.env`   

Instalar as dependências do PHP
```
composer install
```

Inciar o servidor com laravel

```
php artisan serve
```

Instalar as denpendências do Node.js
```
npm install
```

Executar as blibliotecas Node.js
```
npm run dev
```

Instalar as bibliotecas para apresentar o alerta personalizado.
```
npm install sweetalert2
```


## Comandos utilizados com frequencia

Gerar a chave para o arquivo `.env`.
```
php artisan key:generate
```

Executar uma migrantion para criar a base de dados e as tabelas.
```
php artisan migrate

```

Cria um arquivo Request com valiadções do formulário.
```
php artisan make:request NomeDoRequest

```

Cria uma classe para enviar e-mail
```
php artisan make:mail NomeDaClasse

```

