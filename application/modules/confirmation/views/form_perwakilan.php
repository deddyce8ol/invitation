<?php echo form_open($form_action, 'id="form_perwakilan" name="form_perwakilan" class="form-horizontal"');?>
<input type="hidden" name="mode" id="mode" value="add">
<input type="hidden" name="id"  id="id" value="<?php echo $id;?>">
<input type="hidden" name="code" id="code" value="<?php echo $code;?>">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" value="<?php echo $email;?>" placeholder="Email" class="form-control input-md" required="">
  <span class="help-block">Email</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Nama</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" value="<?php echo $name;?>" placeholder="Nama" class="form-control input-md" required="">
  <span class="help-block">Nama Perwakilan</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telp">Kontak</label>  
  <div class="col-md-4">
  <input id="telp" name="telp" type="text" value="<?php echo $telp;?>" placeholder="Kontak" class="form-control input-md">
  <span class="help-block">Kontak</span>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="telp">Facebook ID</label>  
  <div class="col-md-4">
  <input id="fb" name="fb" type="text" value="<?php echo $fb;?>" placeholder="Facebook ID" class="form-control input-md">
  <span class="help-block">Facebook</span>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="telp">Twitter</label>  
  <div class="col-md-4">
  <input id="tw" name="tw" type="text" value="<?php echo $tw;?>" placeholder="Twitter" class="form-control input-md">
  <span class="help-block">Twitter</span>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="telp">Instagram</label>  
  <div class="col-md-4">
  <input id="ig" name="ig" type="text" value="<?php echo $ig;?>" placeholder="Instagram" class="form-control input-md">
  <span class="help-block">Instagram</span>  
  </div>
</div>
<?php echo form_close();?>