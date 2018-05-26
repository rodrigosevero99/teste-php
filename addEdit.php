<?php
//iniciar sessão
session_start();

//pegar dados da sessão
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

//pegar dados do produto
if(!empty($_GET['id'])){
    include 'db.class.php';
    $db = new DB();
    $conditions['where'] = 'id = '.$_GET['id'];
    $conditions['return_type'] = 'single';
    $productData = $db->getRows('tblProduct', $conditions);
}

$actionLabel = !empty($_GET['id'])?'Editar':'Adicionar';

//Mensagem da sess~;ao
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

include("files/header.php");
?>

<div class="container">
    <h2><?php echo $actionLabel; ?> Produto</h2>
    <p><a href="addEdit.php" class="link" >Inserir Produto</a></p>
    <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
    <div class="alert-success"><?php echo $statusMsg; ?></div>
    <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
    <div class="alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <div class="paineldados">
        <form name="formulario" method="post" action="productAction.php" class="form">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="name" value="<?php echo !empty($productData['name'])?$productData['name']:''; ?>">
            </div>
            <div class="form-group">
                <label>descrição</label>
                <textarea class="form-control" name="description" cols="10" rows="3"><?php echo !empty($productData['description'])?$productData['description']:''; ?></textarea>
            </div>
            <div class="form-group">
                <label>Quantidade</label>
                <input type="text" class="form-control" name="quantity" value="<?php echo is_numeric($productData['quantity'])?$productData['quantity']:''; ?>">
            </div>
            <div class="form-group">
                <label>Preço</label>
                <input type="text" class="form-control" name="price" value="<?php echo !empty($productData['price'])?FormataPreco($productData['price']):''; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $productData['id']; ?>">
            <input type="submit" name="formSubmit" value="ENVIAR" onclick="return enviardados()"/>
        </form>
    </div>
    <p><a href="controle.php" class="link">voltar</a></p>
</div>
<?php include("files/footer.php");?>