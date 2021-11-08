
<div id="container_style" class="container">

<a style="
      color: black;
      font-family: Courier New, Courier, monospace;
      font-size: 25;
      padding-left: 40%;
      " href="<?php echo base_url("map_all");?>"  >
      map of all schools   
</a>


    <table id="table" class="table table-striped table-bordered">
      <thead>  
        <tr>
            <th>Škola</th>    
            <th>obor</th>
            <th>počet</th>
            <th></th>
         </tr>
      </thead>  
      <tbody>
        <?php foreach($home as $h): ?>
        <tr>
            <td>
              <a
              href="<?php $id_map=$h->skola_id;  echo base_url("map/".$id_map);?>"
              >

                <?php echo $h->skola_nazev; ?>
              
              </a>
            </td>
            <td><?php echo $h->obor_nazev; ?></td>
            <td><?php echo $h->pocet; ?></td>
            <td>
            

             <a href="<?php $id_skola=$h->prijati_id; echo base_url("edit_school/".$id_skola); ?>">
                <button type="button" class="btn btn-secondary">edit</button></a>
            </td>
        </tr>
         <?php endforeach; ?>
      <tbody>     
    </table>
</div>

<script>
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>