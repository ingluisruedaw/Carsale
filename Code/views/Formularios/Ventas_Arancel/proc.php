<?php 	
$almVentas_Arancel->__SET('id',$_REQUEST['id']);
?>

<table id="data-table-simple" class="responsive-table display" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>Tipo</th>
        </tr>
    </tfoot>
    <tbody>
            <tr>
                <td><?php echo $_POST['carro']; ?></td>
                <td><?php echo $_POST['responsable']; ?></td>
                <td><?php echo $_POST['arancel']; ?></td>
            </tr>
    </tbody>
</table>


<?php 



