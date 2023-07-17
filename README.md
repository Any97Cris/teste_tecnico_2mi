<h2>API Rest que Consome Banco Open Food Fast</h2>


<h3>Tecnologias Usadas</h3>
<ul>
    <li>PHP</li>
    <li>Laravel</li>
    <li>MySQL</li>
    <li>ORM: Eloquent</li>
    <li>Guzzle: Realiza a solicitação HTTP com API Open Food Fast</li>
</ul>

### API esta na pasta api_open_food_fast:

<p>teste_tecnico_2mi/api_open_food_fast_api</p>

### Passos para rodar a API:

### 1 - Baixar os arquivos:
```
composer install e composer update
```

### 2 - Configurar Arquivo ENV:

Nome do Banco e Senha do Banco

### 3 - Rodar as Migrations:
```
php artisan migrate
```

### 4 - Acessar Rotas User:
<p style="font-size:12px">Listar</p>

```
http://127.0.0.1:8000/api/products/
```

<p style="font-size:12px">Filtro por Code</p>

```
http://127.0.0.1:8000/api/products/{$code}
```

<p style="font-size:12px">Cadastrar</p>

```
http://127.0.0.1:8000/api/products/
```
<p style="font-size:12px">Campos e dados para cadastrados em JSON</p>

```
{
    "url" : "algumlugar",
	"creator" : "Autor Desconhecido",
	"created_t" : "2023-07-16 00:00:00",
	"last_modified_t" : "2023-07-16 00:00:00",
	"product_name" : "Autor Desconhecido",
	"quantity" : "380 g (6 x 2 u.)",
	"brands" : "marca desconhecida",
	"categories" : "entretenimento",
	"labels" : "algo",
	"cities" : "manaus",
	"purchase_places" : "am,Brasil",
	"stores" : "Lidl",
	"ingredients_text" : "descricao longa",
	"traces" : "alguns itens",
	"serving_size" : "tamanho grande",                           
	"serving_quantity" : "31.7",
	"nutriscore_score" : "17",
	"nutriscore_grade" : "d",
	"main_category" : "algo",
	"image_url" : "siteextenso"
}

```

<p style="font-size:12px">Atualizar</p>

```
http://127.0.0.1:8000/api/products/{$code}
```

<p style="font-size:12px">Campos e dados para atualizar em JSON</p>

```
{
    "product_name" : "Autor Desconhecido"
}
```

<p style="font-size:12px">Delete</p>

```
http://127.0.0.1:8000/api/products/{$code}
```

<p style="font-size:12px">Acessar Rota CRON - Para import dados do banco Open Food Fast</p>

```
http://127.0.0.1:8000/api/cron
```

<h3>Configurar CRON</h3>

<p>Coloque o seguinte comando para CRON</p>

```
0 0 * * * curl -s http://localhost:8000/api/cron
```

