<?php echo form_open($form_action, 'id="form_perwakilan" name="form_perwakilan" class="wow bounce"');?>
  <input type="hidden" name="mode" id="mode" value="add">
  <input type="hidden" name="id"  id="id" value="<?php echo $id;?>">
  <input type="hidden" name="code" id="code" value="<?php echo $code;?>">
  <!-- Text input-->
  <div class="form-group">
    <input id="email" name="email" type="email" value="<?php echo $email;?>" placeholder="Email" class="form-control input-md" required="">
  </div>

  <!-- Text input-->
  <div class="form-group">
    <input id="name" name="name" type="text" value="<?php echo $name;?>" placeholder="Nama" class="form-control input-md" required="">
  </div>

  <!-- Text input-->
  <div class="form-group">
    <input id="telp" name="telp" type="text" value="<?php echo $telp;?>" placeholder="Kontak" class="form-control input-md">
  </div>

  <div class="form-group">
    <input id="fb" name="fb" type="text" value="<?php echo $fb;?>" placeholder="Facebook ID" class="form-control input-md">
  </div>

  <div class="form-group">
    <input id="tw" name="tw" type="text" value="<?php echo $tw;?>" placeholder="Twitter" class="form-control input-md">
  </div>

  <div class="form-group">
    <input id="ig" name="ig" type="text" value="<?php echo $ig;?>" placeholder="Instagram" class="form-control input-md">
  </div>
<?php echo form_close();?>