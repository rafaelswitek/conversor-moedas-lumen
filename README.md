# Conversor de moedas

Projeto realizado com VueJS e Lumen usando API [Exchange Rates Data API](https://apilayer.com/marketplace/exchangerates_data-api)
| :placard: Vitrine.Dev |                         |
| --------------------- | ----------------------- |
| :sparkles: Nome       | **Conversor de moedas** |
| :label: Tecnologias   | VueJS, Lumen            |
| :rocket: URL          | <http://localhost:3000> |

## Detalhes do projeto

### Instalação e Configuração

#### Front

* Entrar no repositorio: `cd frontend-vue.js`
* Instalar dependencias: `npm install` ou `yarn install`
* Criar o arquivo .env com base no exemplo: `cp .env.example .env`
* Configurar as variaveis no arquivo .env
* Rodar o projeto: `npm run dev` ou `yarn dev`

#### Back

* Entrar no repositorio: `cd backend-lumen`
* Instalar dependencias: `composer install`
* Criar o arquivo .env com base no exemplo: `cp .env.example .env`
* Definir a chave privada na variavel API_LAYER_KEY, ela é gerada no site da [Exchange Rates Data API](https://apilayer.com/marketplace/exchangerates_data-api)
* Criar o banco de dados com: `php artisan migrate`
* Criar o usuario de exemplo com: `php artisan db:seed`
* Rodar o projeto: `php -S localhost:8080 -t public/`

### Conceitos estudados e aplicados

* Integração com uma API REST
* Desenvolvimento do front com VueJS
* Desenvolvimento do back com Lumen
