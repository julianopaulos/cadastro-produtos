<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" type="text/css" href="{{BASE_URL_CSS}}/style/style.css">
</head>
{{header | raw}}
<body>
    <main class="content">
        <section class="header">
            <span>Ações</span>
            <span>Nome</span>
        </section>
        
        <section class="tags">
            {% for tag in tags %}
                <span></span>
                <span>{{ tag.name }}</span>
            {% else %}
                <h3 align="center">Nenhuma tag cadastrado!</h3>
            {% endfor %}
        </section>
    </main>
</body>
</html>