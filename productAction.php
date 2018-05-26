<?php
//iniciar sessão
session_start();

//iniciar conexão
require_once 'db.class.php';
$db = new DB();

$tblName = 'tblProduct';

//caminho padrao para redirecionar
$redirectURL = 'controle.php';

if(isset($_POST['formSubmit'])){
	//validar dados
    if(!empty($_POST['name']) && !empty($_POST['description']) && is_numeric($_POST['quantity']) && $_POST['quantity'] >= 0 && !empty($_POST['price'])){
		
		$erro1 = "";
		//preencheu tudo entao vamos tratar o preco
		if (!preg_match('/^[0-9]+,[0-9]{2}$/', $_POST["price"])) {
			$erro1 .= "O campo Preço deve ser preenchido corretamente";
		} else {
			$dados_Preco = str_replace(",",".",$_POST["price"]);
		}
		
		if($erro1 != ""){
			
			$sessData['status']['type'] = 'error';
			$sessData['status']['msg'] = $erro1;
			
			//redirecionamento
			$redirectURL = 'addEdit.php?id='.$_POST['id'];
			
		} else {
			//continuar
			
			if(!empty($_POST['id'])){
				//alterar
				$productData = array(
					'name' => $_POST['name'],
					'description' => $_POST['description'],
					'quantity' => $_POST['quantity'],
					'price' => $dados_Preco
				);
				$condition = array('id' => $_POST['id']);
				$update = $db->update($tblName, $productData, $condition);
				if($update){
					$sessData['status']['type'] = 'success';
					$sessData['status']['msg'] = 'Registro alterado com sucesso!';
				}else{
					$sessData['status']['type'] = 'error';
					$sessData['status']['msg'] = 'Ocorreu algum erro ao alterar o registro, tente novamente.';
					
					//redirecionamento
					$redirectURL = 'addEdit.php?id='.$_POST['id'];
				}
			}else{
				//inserir
				$productData = array(
					'name' => $_POST['name'],
					'description' => $_POST['description'],
					'quantity' => $_POST['quantity'],
					'price' => $dados_Preco
				);
				$insert = $db->insert($tblName, $productData);
				if($insert){
					$sessData['status']['type'] = 'success';
					$sessData['status']['msg'] = 'Registro inserido com sucesso!';
				}else{
					$sessData['status']['type'] = 'error';
					$sessData['status']['msg'] = 'Ocorreu algum erro ao inserir o registro, tente novamente.';
					
					//redirecionamento
					$redirectURL = 'addEdit.php?id='.$_POST['id'];
				}
			}
			
			
		}
		
        
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Todos os campos são obrigatórios, preencha-os corretamente.';
        
        //redirecionamento
        $redirectURL = 'addEdit.php?id='.$_POST['id'];
    }
    
    //registrar mensagem na sess~;ao
    $_SESSION['sessData'] = $sessData;
    
    //redirecionar
    header("Location:".$redirectURL);
	
}elseif(($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])){
    //excluír
    $condition = array('id' => $_GET['id']);
    $delete = $db->delete($tblName, $condition);
    if($delete){
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'Registro excluído com sucesso.';
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Ocorreu algum erro ao excluír o registro, tente novamente.';
    }
    
    //egistrar mensagem na sessão
    $_SESSION['sessData'] = $sessData;

    //redirecionar
    header("Location:".$redirectURL);
	
}elseif(($_REQUEST['action_type'] == 'aumentar') && !empty($_GET['id'])){
    //alterar
	$productData = array(
		'quantity' => '+'
	);
	$condition = array('id' => $_GET['id']);
	$update = $db->estoque($tblName, $productData, $condition);
	if($update){
		$sessData['status']['type'] = 'success';
		$sessData['status']['msg'] = 'Estoque alterado com sucesso!';
	}else{
		$sessData['status']['type'] = 'error';
		$sessData['status']['msg'] = 'Ocorreu algum erro ao alterar o estoque, tente novamente.';
		
		//redirecionamento
		header("Location:".$redirectURL);
	}
	//egistrar mensagem na sessão
    $_SESSION['sessData'] = $sessData;

    //redirecionar
    header("Location:".$redirectURL);
}elseif(($_REQUEST['action_type'] == 'reduzir') && !empty($_GET['id'])){
    //alterar
	$productData = array(
		'quantity' => '-'
	);
	$condition = array('id' => $_GET['id']);
	$update = $db->estoque($tblName, $productData, $condition);
	if($update){
		$sessData['status']['type'] = 'success';
		$sessData['status']['msg'] = 'Estoque alterado com sucesso!';
	}else{
		$sessData['status']['type'] = 'error';
		$sessData['status']['msg'] = 'Ocorreu algum erro ao alterar o estoque, tente novamente.';
		
		//redirecionamento
		header("Location:".$redirectURL);
	}
	//egistrar mensagem na sessão
    $_SESSION['sessData'] = $sessData;

    //redirecionar
    header("Location:".$redirectURL);
}
exit();
?>