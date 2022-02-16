<h1>
    Gerenciamento de Produtos e Tags
</h1>
<h3>Passo a passo de execução</h3>
<ul>
    <li>
        Crie uma pasta com o nome <code>teste_cadastro_produtos</code> na raíz, e, dentro dela, dê o git clone do projeto, ou, escolha outro nome e dê o git clone do projeto;
    </li>
    <li>
        Caso tenha criada uma pasta com nome diferente, troque o nome <code>teste_cadastro_produtos</code> da constante <code>BASE_URL</code> dentro do arquivo <code>config/config.php</code> com o nome da nova pasta criada. Caso a estilização
        não seja carregada, ou ocorra erro na conexão com o banco, verifique o arquivo <code>config/config.php</code>;
    </li>
    <li>
        Execute os comandos SQL do arquivo db.sql no gerenciador de banco de dados;
    </li>
    <li>
        Inserir/trocar as credenciais do banco de dados no arquivo <code>config/config.php</code> nas constantes 
        <code>DB_HOST</code>, <code>DB_NAME</code>, <code>DB_USER</code> e <code>DB_PASS</code>.
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
