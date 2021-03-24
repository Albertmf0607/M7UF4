		<table border="1">
		<tr><th>AUTORS: </h3></th></tr>
		<?php
		foreach($arrayAutors as $autor){

		?>
			<tr><td><b>Autor num: </td> <td><?php echo $autor->getId(); ?></td>
			</tr>
			<tr><td>Nom: </td><td><?php
			echo $autor->getNom(); ?></td>			</tr>
			<tr><td>Cognoms: </td><td> <?php echo $autor->getCognoms(); ?></td>	</tr>
		<?php
		}
?>
		</table>
