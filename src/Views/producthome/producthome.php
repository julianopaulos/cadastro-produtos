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
        <section class="header">
            <span>Ações</span>
            <span>Nome</span>
            <span>Tag</span>
        </section>
        <section class="products">
            {% for product in products %}
                <span>{{ product.name }}</span>
                <span>{{ product.tag }}</span>
            {% else %}
                <h3 align="center">Nenhum produto ainda cadastrado!</h3>
            {% endfor %}
        </section>
    </main>
</body>
</html>