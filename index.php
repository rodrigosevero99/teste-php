<?php

//iniciar conexão
require_once 'db.class.php';
$db = new DB();

//Selecionar dados dos produtos regra 1 - todos os produtos que estão com 3 ou menos volumes em estoque
$products = $db->getRows('tblProduct',array('where'=>'quantity <= 3','order_by'=>'name ASC, price ASC'));

//Selecionar dados dos produtos regra 2 - cinco últimos produtos movimentados no estoque
$products1 = $db->getRows('tblProduct',array('order_by'=>'modified DESC', 'limit'=>'5'));

include("files/header.php");
?>
<div class="container">
    <h2>Home</h2>
    <p>Todos os produtos que estão com 3 ou menos volumes em estoque</p>
    <table class="grid">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th width="300">Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Data Cadastro</th>
                <th>Data Última alteração</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($products)): $count = 0; foreach($products as $row): $count++; ?>
            <tr>
                <td class="centro"><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td class="centro"><?php echo $row['quantity']; ?></td>
                <td><?php echo FormataPreco($row['price']); ?></td>
                <td class="centro"><?php echo FormataData($row['created']); ?></td>
                <td class="centro"><?php echo FormataData($row['modified']); ?></td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="7">Nenhum produto encontrado</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <p>Cinco últimos produtos movimentados no estoque</p>
    <table class="grid">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th width="300">Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Data Cadastro</th>
                <th>Data Última alteração</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($products1)): $count1 = 0; foreach($products1 as $row1): $count1++; ?>
            <tr>
                <td class="centro"><?php echo $row1['id']; ?></td>
                <td><?php echo $row1['name']; ?></td>
                <td><?php echo $row1['description']; ?></td>
                <td class="centro"><?php echo $row1['quantity']; ?></td>
                <td><?php echo FormataPreco($row1['price']); ?></td>
                <td class="centro"><?php echo FormataData($row1['created']); ?></td>
                <td class="centro"><?php echo FormataData($row1['modified']); ?></td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="7">Nenhum produto encontrado</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include("files/footer.php");?>