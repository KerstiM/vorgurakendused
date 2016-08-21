<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>KOMMENTAARIDE LISAMINE ANDMEBAASI</title>
	</head>

	<body>
    <h1>KOMMENTAARIDE LISAMINE ANDMEBAASI</h1>

    <form action="?page=komm" method="POST">
        <input type="text" placeholder="pealkiri" name="title" value="<?php if (!empty($_POST['title'])) echo htmlspecialchars($_POST['title']);?>"/><br/>
            <textarea name="content" rows="10" cols="60"><?php if (!empty($_POST['content'])) echo htmlspecialchars($_POST['content']);?></textarea><br/>
        <input type="submit" value="Postita"/>
    </form>

		<?php


		function connect_db(){
			global $L;
			$host="localhost";
			$user="test";
			$pass="t3st3r123";
			$db="test";
			$L = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
			mysqli_query($L, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($L));
		}
		connect_db();

		function tee_komment($id){
			global $L;
			$content = mysqli_real_escape_string($L, $_POST['content']);
			$sql = "INSERT INTO KM_kommentaarid (postitus_id, content, postedat) VALUES ($id, '$content', NOW() )";
			$result= mysqli_query($L, $sql);
			header("Location: ?page=post&id=$id");
			exit(0);
		}
		tee_komment();


		function hangi_kommentaarid(){
			global $L;
			$kommentaarid = array();
			$sql = "SELECT postitus_id, content FROM KM_kommentaarid";
			$result = mysqli_query($L, $sql);
				return $kommentaarid;
			}

		?>

    <?php if(!empty($errors)):
    	foreach($errors as $e):?>
    		<p style="color:red"><?php echo $e; ?></p>
    <?php	endforeach;
    endif;?>


	</body>
</html>
