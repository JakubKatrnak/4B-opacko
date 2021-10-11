<div id="container_style" class="container"> 
      
    <?php $validation = \Config\Services::validation();?>
    
    <form action="<?= base_url("do_add"); ?>" method="post">
    <div class="form-group">
        <div class="row">
        <div class="col">
                <div class="form-group">   
                    <label for="skola">Škola</label>
                    <select name="skola"  class="form-control">
                     
                    <?php foreach($home as $h): ?>  
                    <option value="<?php echo $h->skola_id;?>"> <?php echo $h->skola_nazev; ?></option>
                    <?php endforeach; ?> 
                    
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">   
                    <label for="mesto">Město</label>
                    <select name="mesto"  class="form-control">
                     
                    <?php foreach($home as $h): ?>  
                    <option value="<?php echo $h->mesto_id;?>"> <?php echo $h->mesto_nazev; ?></option>
                    <?php endforeach; ?> 
                    
                    </select>
                </div>
            </div>
    </div>
    <div class="form-group">
    <div class="row">
            <div class="col">
                <label for="pocet">Počet</label>
                <input type="input" class="form-control" name="pocet">
                <?php 
            if($validation->getError('pocet')){
                echo '<div class="alert alert-danger mt-2">'.$validation->getError('pocet').'</div>';
            }
        ?>
            </div>
            <div class="col">
                <div class="form-group">   
                    <label for="obor">obor</label>
                    <select name="obor"  class="form-control">
                        <option value="1">OA</option>
                        <option value="2">IT</option>
                    </select>
                </div>
            </div>
         </div>
    </div>
    <button type="submit"  name='submit' value='Submit' class="btn btn-primary">Submit</button>
    </form>
    
</div>