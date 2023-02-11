
# Configuração

Baixe o projeto ou clone o repositório, após rode os comandos abaixo.

`composer install`

Configure o arquivo .env seguindo o env.example e rode o comando abaixo.

`php artisan serve`




## Documentação da API

#### Retorna lista de municípios

```http
  GET /v1/municipios/{uf}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `uf` | `string` | **Obrigatório**. Sigla da UF. ex: PR |

Para acessar o Swagger acesse no seu navegador.

```http
  GET api/documentation
```


## Variáveis de Ambiente

Você pode mudar de api de pesquisa usando a:

`PROVIDER_DEFAULT=ibge`

ou

`PROVIDER_DEFAULT=brasilapi`

no seu arquivo .env

