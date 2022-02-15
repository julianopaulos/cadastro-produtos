<h1>
    Gerenciamento de Produtos e Tags
</h1>
<h3>Passo a passo de execução</h3>
<ul>
    <li>
        crie uma pasta com o nome 'teste_cadastro_produtos' na raíz, ou, escolha outro nome e troque o nome da constante BASE_URL dentro do arquivo config/config.php com o nome escolhido;
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
        t.id, t.name, GROUP_CONCAT(p.name)
    FROM
        tag t
            INNER JOIN
        product_tag pt ON pt.tag_id = t.id
            INNER JOIN
        product p ON p.id = pt.product_id
    GROUP BY t.id
```