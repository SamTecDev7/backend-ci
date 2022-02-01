<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-cog fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Configurações de email</h4>
                  </div>
                  <div class="card-body">
      <?php if(isset($message)) echo $message;?>
          <form action="" method="post" class="form-horizontal form-variance" enctype="multipart/form-data">
        
      <div class="row">
          <label class="col-sm-2 col-form-label">Email de Remetente
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="email_remetente" class="form-control" value="<?php echo ConfiguracoesSistema('email_remetente');?>" required>
            </div>
          </div>
        </div>
              
        <div class="row">
          <label class="col-sm-2 col-form-label">Usar SMTP?
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
<div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="smtp"  value="1" <?php echo (ConfiguracoesSistema('smtp_enabled') == 1) ? 'checked' : '';?>>
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="smtp" value="0" <?php echo (ConfiguracoesSistema('smtp_enabled') == 0) ? 'checked' : '';?>>
                            Não
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                </div>
            </div>
          </div>
        </div>
              
              
        <div id="configuracoes_smtp" style="display:<?php echo (ConfiguracoesSistema('smtp_enabled') == 1) ? 'block' : 'none';?>">
      <div class="row">
          <label class="col-sm-2 col-form-label">SMTP Host
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                      <input type="text" name="smtp_host" class="form-control" value="<?php echo ConfiguracoesSistema('smtp_host');?>">
            </div>
          </div>
        </div>
            
      <div class="row">
          <label class="col-sm-2 col-form-label">SMTP User
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                      <input type="text" name="smtp_user" class="form-control" value="<?php echo ConfiguracoesSistema('smtp_user');?>">
            </div>
          </div>
        </div>
            
      <div class="row">
          <label class="col-sm-2 col-form-label">SMTP Password
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                      <input type="password" name="smtp_pass" class="form-control" value="<?php echo ConfiguracoesSistema('smtp_pass');?>">
            </div>
          </div>
        </div>
            
      <div class="row">
          <label class="col-sm-2 col-form-label">SMTP Encrypt
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                      <input type="text" name="smtp_encrypt" class="form-control" value="<?php echo ConfiguracoesSistema('smtp_encrypt');?>">
            </div>
          </div>
        </div>
            
        </div>
        
        <div class="row">
          <label class="col-sm-2 col-form-label">&nbsp;
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Atualizar Configurações">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
