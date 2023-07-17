<h1>Backend Challenge 20230105</h1>

<hr>

<h2>API Rest que Consome Banco Open Food Facts</h2>

<h3>Tecnologias Usadas</h3>
<ul>
    <li>PHP</li>
    <li>Laravel</li>
    <li>MySQL</li>
    <li>ORM: Eloquent</li>
    <li>Guzzle: Realiza a solicitação HTTP com API Open Food Facts</li>
</ul>

### API esta na pasta api_open_food_fast:

<p>teste_tecnico_2mi/api_open_food_fast</p>

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

<p style="font-size:12px">Acessar Rota CRON - Para import dados do banco Open Food Facts</p>

```
http://127.0.0.1:8000/api/cron
```

<h3>Configurar CRON</h3>

<p>Coloque o seguinte comando para CRON</p>

```
0 0 * * * curl -s http://localhost:8000/api/cron
```

<h3>Processo de investigação para o desenvolvimento da atividade </h3>

<p>1 - Usei o framework Laravel<p>
<p>2 - Fiz a migration, tabela products com base no arquivo products.json</p>
<p>3 - Criei os campos personalizados status(enum['draft', 'trash', 'published']) e imported_t( Date com a dia e hora que foi importado)</p>
<p>4 - Criei o Model Product</p>
<p>5 - Criei o Controller ProductController</p>
<p>6 - Criei o Controller ProductController</p>
<p>7 - Fiz as funcionalidades básicas da API<p>
<p>8 - Tentei usar o SDK openfoodfacts/openfoodfacts-laravel, mas não tive sucesso<p>
<p>9 - Resolvi comunicar direto com a API(https://world.openfoodfacts.org/api/v2/)<p>
<p>10 - Criei uma rota para executar a CRON,importa os dados do banco open food facst</p>