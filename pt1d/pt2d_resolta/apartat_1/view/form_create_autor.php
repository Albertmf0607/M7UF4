<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ca" lang="ca">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<form action="../controller/create_autor_ctl.php" method='post'>
			 <table border='1' cellpadding='2' cellspacing='2'>
				 <tr>
					 <td>Nom</td>
					 <td><input type='text' name='nom' size='50'/></td>
				 </tr>
				 <tr>
				 	<td>Cognoms</td>
				 	<td><input type='text' name='cognoms' size='50'/></td>
				 </tr>
			</table><br/>
			<input type='submit' name='submit' value='Envia' />
		</form>
	</body>
</html>
