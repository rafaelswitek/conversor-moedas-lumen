# Conversor de moedas

Projeto realizado Lumen usando API [Exchange Rates Data API](https://apilayer.com/marketplace/exchangerates_data-api)

> [Frontend em Vue](https://github.com/rafaelswitek/conversor-moedas-vue)

| :placard: Vitrine.Dev |                         |
| --------------------- | ----------------------- |
| :sparkles: Nome       | **Conversor de moedas** |
| :label: Tecnologias   | Lumen, SQLite            |
| :rocket: URL          | <http://localhost:3000> |

## Detalhes do projeto

### Instalação e Configuração

* Instalar dependencias: `composer install`
* Criar o arquivo .env com base no exemplo: `cp .env.example .env`
* Definir a chave privada na variavel API_LAYER_KEY, ela é gerada no site da [Exchange Rates Data API](https://apilayer.com/marketplace/exchangerates_data-api)
* Criar o banco de dados com: `php artisan migrate`
* Criar o usuario de exemplo com: `php artisan db:seed`
* Rodar o projeto: `php -S localhost:8080 -t public/`

### Conceitos estudados e aplicados

* Namespace e Uso de Classes: O código utiliza namespaces para organizar os controladores e os modelos. Os namespaces são uma forma de agrupar classes relacionadas. Além disso, é feito uso de use para importar as classes e facilitar o acesso a elas.
* Roteamento: O código faz parte de um controlador em um aplicativo Laravel, o que implica o uso do sistema de roteamento do framework. Os métodos store e show são chamados de acordo com as rotas definidas no aplicativo.
* Injeção de Dependência: O método store recebe uma instância da classe Request como parâmetro. Isso é um exemplo de injeção de dependência, um conceito importante para a criação de código mais testável e desacoplado.
* Validação de Dados: A função validate é usada para validar os dados recebidos no método store. Isso ajuda a garantir que os dados sejam adequados antes de serem usados, melhorando a segurança e a confiabilidade do aplicativo.
* Configuração: O código faz uso do sistema de configuração do Laravel para acessar o valor da chave services.apilayer.key. Isso é útil para manter informações sensíveis, como chaves de API, fora do código-fonte.
* Requisições HTTP: O código utiliza a classe Http fornecida pelo Laravel para fazer uma requisição HTTP a um serviço externo. Isso é útil para interagir com serviços web, como APIs.
* Tratamento de Erros: O código faz o tratamento de erros ao verificar se a resposta HTTP da API externa está no estado "ok". Em caso de erro, uma resposta JSON com uma mensagem de erro é retornada.
* Criação de Registros no Banco de Dados: O código utiliza o modelo Rate para criar registros no banco de dados. Isso envolve a inserção de dados no banco de dados, o que é uma operação fundamental em muitos aplicativos.
* Ordenação de Dados: O método orderByDesc é usado para ordenar os resultados da consulta de maneira descendente com base na data de criação.
* Respostas JSON: O código utiliza o método response()->json() para retornar respostas no formato JSON, que é comum em APIs RESTful.
