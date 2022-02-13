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
        </section>
        
        
        {% for tag in tags %}
            <section class="tag" id="{{tag.id}}">
                <div>
                    <a href="./edittag/{{tag.id}}" class="material-icons" id="edit">edit</a>
                    <span class="material-icons" id="delete" onclick="deleteTag('{{tag.id}}')">delete</span>
                </div>
                <span>{{ tag.name }}</span>
            </section>
        {% else %}
            <h3 align="center">Nenhuma tag cadastrado!</h3>
        {% endfor %}
        
    </main>
<script src="{{BASE_URL_ASSETS}}/js/delete.js"></script>
</body>
</html>