<div id="container_style" class="container"> 
      
    <?php $validation = \Config\Services::validation();?>
    <?php foreach($edit_school as $e): ?>
    
    <form action="<?= $id_school=$e->id; base_url("edit_film/".$id_school); ?>" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="skola">Škola</label>
                <input type="input" class="form-control" name="skola" value="<?php echo $e->skola;?>">
                <?php 
                    if($validation->getError('skola')){
                        echo '<div class="alert alert-danger mt-2">'.$validation->getError('skola').'</div>';
                    }
                ?>
            </div>
            <div class="col">
                <label for="mesto">Město</label>
                <input type="input" class="form-control" name="mesto" value="<?php echo $e->mesto;?>">
                <?php 
                    if($validation->getError('mesto')){
                        echo '<div class="alert alert-danger mt-2">'.$validation->getError('mesto').'</div>';
                    }
                ?>
            </div>
         </div>
    </div>
    <div class="form-group">
    <div class="row">
            <div class="col">
                <label for="pocet">Počet</label>
                <input type="input" class="form-control" name="pocet" value="<?php echo $e->pocet;?>">
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
                        <option value="1" <?php if($e->obor==1){echo "selected";}?>>OAUH</option>
                        <option value="2" <?php if($e->obor==2){echo "selected";}?>>IT</option>
                    </select>
                </div>
            </div>
         </div>
    </div>
    <?php endforeach; ?>
    <button type="submit"  name='submit' value='Submit' class="btn btn-primary">Submit</button>
    </form>
    
</div>