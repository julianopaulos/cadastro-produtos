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
            <span>Tags</span>
        </section>
        
        {% for product in products %}
            <section class="product">
                <div>
                    <a href="./edittag/{{tag.id}}" class="material-icons" id="edit">edit</a>
                    <span class="material-icons" id="delete" onclick="deleteTag('{{tag.id}}')">delete</span>
                </div>
                <span>{{ product.name }}</span>
                <span>{{ product.tags }}</span>
            </section>
        {% else %}
                <h3 align="center">Nenhum produto ainda cadastrado!</h3>
        {% endfor %}
        
    </main>
</body>
</html>