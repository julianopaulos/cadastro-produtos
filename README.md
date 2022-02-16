<h1>
    Gerenciamento de Produtos e Tags
</h1>
<h3>Passo a passo de execução</h3>
<ul>
    <li>
        Crie uma pasta com o nome 'teste_cadastro_produtos' na raíz, e, dentro dela, dê o git clone do projeto, ou, escolha outro nome e dê o git clone do projeto;
    </li>
    <li>
        Caso tenha criada uma pasta com nome diferente, troque o nome da constante BASE_URL dentro do arquivo config/config.php com o nome da nova pasta criada
    </li>
    <li>
        Execute os comandos SQL do arquivo db.sql no gerenciador de banco de dados;
    </li>
    <li>
        Inserir as credenciais do banco de dados no arquivo config/config.php.
    </li>
</ul>

<h3>Query de extração do relatório de relevância de produtos</h3>

```
    SELECT 
        t.id AS tag_id,
        t.name AS tag_name,
        GROUP_CONCAT('<li>', p.name SEPARATOR '</li>') AS products
    FROM
        tag t
            INNER JOIN
        product_tag pt ON pt.tag_id = t.id
            INNER JOIN
        product p ON p.id = pt.product_id
    GROUP BY t.id
    ORDER BY COUNT(t.id) DESC, t.id ASC
```
