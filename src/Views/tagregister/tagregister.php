<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tag</title>
    <link rel="stylesheet" type="text/css" href="{{BASE_URL_ASSETS}}/style/style.css">
</head>
{{header | raw}}
<body>
    <main class="content">
        <form class="tag_form" name="tag_form">
            <label for="name">Nome da tag</label>
            <input type="text" id="name" name="name" required/>
            <button type="submit">Cadastrar</button>
        </form>
    </main>
    <script src="{{BASE_URL_ASSETS}}/js/register.js"></script>
    
</body>
</html>