<?php
//iniciar sessão
session_start();

//pegar dados da sessão
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

//iniciar conexão
require_once 'db.class.php';
$db = new DB();

//Selecionar dados dos produtos
$products = $db->getRows('tblProduct',array('select' => 'id, name, quantity, price', 'order_by'=>'name ASC, price ASC'));

//Mensagem da sess~;ao 
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

include("files/header.php");
?>
<div class="container">
    <h2>Controle de produtos</h2>
    <p><a href="addEdit.php" class="link">Inserir Produto</a></p>
    <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
    <div class="alert-success"><?php echo $statusMsg; ?></div>
    <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
    <div class="alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <table class="grid">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($products)): $count = 0; foreach($products as $row): $count++; ?>
            <tr <?php if($row['quantity'] <= 3) {?> bgcolor="#FF9999"<?php }?>>
                <td class="centro"><?php echo $row['id']; ?></td>
                <td><a href="view.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                <td class="centro"><?php echo $row['quantity']; ?></td>
                <td><?php echo FormataPreco($row['price']); ?></td>
                <td>
                    <a href="addEdit.php?id=<?php echo $row['id']; ?>">Editar</a> | <a href="productAction.php?action_type=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('tem certeza que deseja excluír este registro?')">Excluír</a> | <a href="productAction.php?action_type=aumentar&id=<?php echo $row['id']; ?>">Aumentar estoque</a><?php if($row['quantity'] > 0) {?> | <a href="productAction.php?action_type=reduzir&id=<?php echo $row['id']; ?>">Reduzir estoque</a><?php }?>
                </td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="5">Nenhum produto encontrado</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include("files/footer.php");?>