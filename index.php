<!DOCTYPE html>
<html>
<head>
	<title>Mensagens</title>
</head>
<body>
	<fieldset>
		<form method="post" > 
			Nome<br/>
			<input type="text" name="nome"><br/><br/>
			Mensagem:<br/>
			<textarea name="mensagem"></textarea><br/><br/>
			<input type="submit" name="" value="Enviar Mensagem">

		</form>
	</fieldset>
	<br/><br/>
<?php
	require 'config.php';
	if(isset($_POST['nome']) && empty($_POST['nome']) == false)
	{
		$nome = addslashes($_POST['nome']);
		$msg = addslashes($_POST['mensagem']);
		$sql = $pdo->prepare("INSERT INTO mensagens SET  nome =:nome, msg=:msg, data = NOW()");
		$sql->bindValue(":nome:",$nome);
		$sql->bindValue(":msg",$msg);
		
	}
	?>
	<?php 
	require 'config.php';
	$sql ="SELECT * FROM mensagens ORDER BY data  DESC";
	$sql = $pdo->query($sql);
	if ($sql->rowCount ()> 0) {
		foreach ($sql->fetchAll() as $msg):
			?>
		<strong><?php echo $msg['nome']; ?></strong> <br/>
		<?php echo $msg['msg']; ?>
		<hr/>
		<?php
	endforeach;
}else{
	echo "não há mensagens";
}	
?>
</body>
</html>