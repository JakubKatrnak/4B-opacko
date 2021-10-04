<div id="container_style" class="container"> 
      
    <?php $validation = \Config\Services::validation();?>
    
    <form action="<?= base_url("do_add"); ?>" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="skola">Škola</label>
                <input type="input" class="form-control" name="skola">
                <?php 
                    if($validation->getError('skola')){
                        echo '<div class="alert alert-danger mt-2">'.$validation->getError('skola').'</div>';
                    }
                ?>
            </div>
            <div class="col">
                <label for="mesto">Město</label>
                <input type="input" class="form-control" name="mesto">
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
                        <option value="1">OAUH</option>
                        <option value="2">IT</option>
                    </select>
                </div>
            </div>
         </div>
    </div>
    <button type="submit"  name='submit' value='Submit' class="btn btn-primary">Submit</button>
    </form>
    
</div>