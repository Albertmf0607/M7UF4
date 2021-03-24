		<table border="1">
		<tr><th>LLIBRES: </h3></th></tr>
		<?php
		foreach($arrayLlibres as $llibre){

		?>
			<tr><td><b>Llibre num: </td> <td><?php echo $llibre->getId(); ?></td>
				<td><a href="../controller/edit_llibre_ctl.php?id=<?php echo $llibre->getId()?>">Editar</a></td>
				<td><a href="../controller/delete_llibre_ctl.php?id=<?php echo $llibre->getId()?>">Eliminar</a></td>
			</tr>
			<tr><td>Títol: </td><td><?php
			// toString
			// echo $llibre->toString();

			// toString magic
			echo $llibre; ?></td>			</tr>
			<tr><td>Data de publicació: </td><td><?php
			//echo $llibre->getDataPublic();
			// https://www.php.net/manual/es/datetime.format.php
			$data = new DateTime($llibre->getDataPublic());
			echo $data->format('d-m-Y');?>
		  </td>			</tr>
			<tr><td>Autor: </td><td> <?php echo $llibre->getNomCognomsAutor(); ?></td>	</tr>
		<?php
		}
?>
		</table>
