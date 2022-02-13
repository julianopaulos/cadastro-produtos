<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" type="text/css" href="{{BASE_URL_ASSETS}}/style/style.css">
</head>
{{header | raw}}
<body>
    <main class="content">
        <form class="product_form" name="product_form">
            <label for="name">Nome do Produto</label>
            <input type="text" id="name" name="name" required/>
            <label for="tags">Tags</label>
            <Select id="tags" name="tags" placeholder="Escolha as tags do produto" multiple="multiple" required>
                {% for tag in tags %}
                    <option value="{{tag.id}}">{{tag.name}}</option>
                {% endfor %}
            </Select>
            <button type="submit">Cadastrar</button>
        </form>
    </main>
    <script src="{{BASE_URL_ASSETS}}/js/register.js"></script>
    
</body>
</html>