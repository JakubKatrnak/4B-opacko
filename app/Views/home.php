<div id="container_style" class="container">
    <table class="table table-striped table-bordered">
        <tr>
            <th>Škola</th>    
            <th>počet</th>
         </tr>
        <?php foreach($home as $h): ?>
        <tr>
            <td><?php echo $h->nazev; ?></td>
            <td><?php echo $h->pocet; ?></td>
            <td>
             <a href="<?php $id_skola=$h->id; echo base_url("edit_school/".$id_skola); ?>"><button type="button" class="btn btn-secondary">edit</button></a>
            </td>
        </tr>
         <?php endforeach; ?>     
    </table>
</div>