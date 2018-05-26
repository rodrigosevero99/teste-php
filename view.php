<?php

//caminho padrao para redirecionar
$redirectURL = 'controle.php';

//pegar dados do produto
if(!empty($_GET['id'])){
    include 'db.class.php';
    $db = new DB();
    $conditions['where'] = 'id = '.$_GET['id'];
    $conditions['return_type'] = 'single';
    $productData = $db->getRows('tblProduct', $conditions);
} else {
	//redirecionar
    header("Location:".$redirectURL);
}

include("files/header.php");
?>

<div class="container">
    <h2>Detalhes do produto</h2>
    <p><a href="addEdit.php" class="link">Inserir Produto</a></p>
    <div class="paineldados">
        <div class="form-group">
            <label>Nome</label>
            <span><?php echo $productData['name']; ?></span>
        </div>
        <div class="form-group">
            <label>descrição</label>
            <span><?php echo $productData['description']; ?></span>
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <span><?php echo $productData['quantity']; ?></span>
        </div>
        <div class="form-group">
            <label>Preço</label>
            <span><?php echo FormataPreco($productData['price']); ?></span>
        </div>
        <div class="form-group">
            <label>Data Cadastro</label>
            <span><?php echo FormataData($productData['created']); ?></span>
        </div>
        <div class="form-group">
            <label>Data da última atualização</label>
            <?php echo FormataData($productData['modified']); ?>
        </div>
    </div>
    <p><a href="controle.php" class="link">voltar</a></p>
</div>
<?php include("files/footer.php");?>