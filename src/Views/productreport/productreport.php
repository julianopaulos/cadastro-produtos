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
                    Tag
                </th>
                <th align="left">
                    Produtos
                </th>
            </thead>
            <tbody>
                {% for product in products_rel %}
                <tr class="data" id="{{product.id}}">
                    <td>
                        {{ product.tag_name }}
                    </td>
                    <td align="left"><ul>{{ product.products|raw }}</ul></td>
                </tr>
                {% else %}
                <tr>
                    <td colspan="2">
                        <h3 align="center">Nenhum item a ser apresentado!</h3>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </main>
</body>
</html>