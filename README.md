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

Para a funncionalidade enviar e-mail funcionar, necessário alterar as credenciais do servidor de envio de e-mail no arquivo .env.
- Utilizar o servidor fake durante o desenvolvimento [Acessar envio gratuito de e-mail](https://mailtrap.io/)
- Utilizar o servidor Iagente no ambiente de produção [Acessar envio gratuito de e-mail](https://login.iagente.com.br/solicitacao-conta-smtp)

```
# MAIL_MAILER=smtp
# MAIL_SCHEME=null
# MAIL_HOST=smart.iagentesmtp.com.br
# MAIL_PORT=587
# MAIL_USERNAME=name-do-usuario-na-iagente
# MAIL_PASSWORD=senha-do-usuario-na-iagente
# MAIL_FROM_ADDRESS="colocar-email-remetente@dominio.com.br"
# MAIL_FROM_NAME="${APP_NAME}"
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

