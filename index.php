<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Comercial - Formulário Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Sistema Comercial</h1>
        <nav>
            <a href="#clientes">Clientes</a>
            <a href="#produtos">Produtos</a>
            <a href="#compras">Compras</a>
            <a href="#relatorios">Relatórios</a>
        </nav>
    </header>

    <main>

        <section id="clientes" class="card">
            <h2>Cadastrar Clientes</h2>

            <form action="cliente.php" method="POST">
                <label>Nome do Cliente</label>
                <input type="text" name="nome" placeholder="Digite o nome">

                <label>Email</label>
                <input type="email" name="email" placeholder="email@exemplo.com">

                <label>Telefone</label>
                <input type="text" name="telefone" placeholder="(00) 00000-0000">

                <button type="submit" name="submit">Cadastrar Cliente</button>
            </form>
        </section>

        <section id="produtos" class="card">
            <h2>Cadastrar Produtos</h2>

            <form action="produto.php" method="POST">
                <label>Nome do Produto</label>
                <input type="text" name="nome" placeholder="Ex.: Teclado Mecânico">

                <label>Preço</label>
                <input type="number" name="preco" placeholder="Ex.: 199.90">

                <label>Estoque</label>
                <input type="number" name="quantidade" placeholder="Quantidade">

                <button type="submit" name="submit">Cadastrar Produto</button>
            </form>
        </section>

        <section id="compras" class="card">
            <h2>Registrar Compra</h2>

            <?php
                include_once('servidor.php');
            ?>

            <form action="compra.php" method="POST">
                <label>Cliente</label>
                <select name="id_cliente">
                    <option value="">Selecione...</option>
                    <?php

                        $sql = "SELECT idcliente, nome FROM cliente ORDER BY nome";
                        $result = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='{$row['idcliente']}'>{$row['nome']}</option>";
                        }

                    ?>
                </select>

                <label>Produto</label>
                <select name="id_produto">
                    <option value="">Selecione...</option>
                    <?php
                    
                        $sql = "SELECT idproduto, nome FROM produto ORDER BY nome";
                        $result = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='{$row['idproduto']}'>{$row['nome']}</option>";
                        }
                    ?>
                    
                </select>

                <label>Quantidade</label>
                <input type="number" name="quantidade" placeholder="Ex.: 3">

                <button type="submit" name="submit">Registrar Compra</button>
            </form>
        </section>

        <section id="relatorios" class="card">
            <h2>Relatório de Compras</h2>

            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Total Comprado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        include_once('servidor.php');

                        $sql = "SELECT c.nome AS cliente, SUM(p.preco * co.quantidade) AS total
                        FROM  compra co
                        INNER JOIN cliente c ON co.id_cliente = c.idcliente
                        INNER JOIN produto p ON co.id_produto = p.idproduto
                        GROUP BY c.nome
                        ORDER BY c.nome
                        ";

                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['cliente']}</td>";
                            echo "<td>R$ ". number_format($row['total'], 2, ',', '.') . "</td>";
                            echo "</tr>";
                        }

                    ?>
                </tbody>
            </table>
        </section>

    </main>

</body>
</html>
