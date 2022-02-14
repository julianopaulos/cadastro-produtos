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
        <table>
            <thead class="header">
                <th>
                    Ações
                </th>
                <th>
                    Nome
                </th>
            </thead>
            <tbody>
                {% for product in products %}
                    <tr  class="product">
                            <td>
                                <a href="./edittag/{{tag.id}}" class="material-icons" id="edit">edit</a>
                                <span class="material-icons" id="delete" onclick="deleteTag('{{tag.id}}')">delete</span>
                            </td>
                            <td>{{ product.name }}</td>
                    </tr>
                {% else %}
                    <tr>
                        <td colspan="2">
                            <h3 align="center">Nenhum produto ainda cadastrado!</h3>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </main>
</body>
</html>