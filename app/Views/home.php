
<div id="container_style" class="container">

<input type="text" id="input" onkeyup="searchByName()" placeholder="Search by name">

<select id="dropdown" oninput="searchByField()">
  <option>všechny</option>
  <option>OA</option>
  <option>IT</option>
</select>

<a  onclick="sortTable(0)" >A↔Z</a>

    <table id="table" class="table table-striped table-bordered">
        <tr>
            <th>Škola</th>    
            <th>obor</th>
            <th>počet</th>
            <th></th>
         </tr>
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
    </table>
</div>

<script>
function searchByName() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function searchByField(){
  let dropdown, table, rows, cells, field, filter;
  dropdown = document.getElementById("dropdown");
  table = document.getElementById("table");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;
  for (let row of rows) { 
    cells = row.getElementsByTagName("td");
    field = cells[1] || null;
    if (filter === "všechny" || !field || (filter === field.textContent)) {
      row.style.display = "";
    }
    else {
      row.style.display = "none";
    }
  }
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table");
  switching = true;
  dir = "asc"; 
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;      
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>