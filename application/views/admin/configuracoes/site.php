<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-cog fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Configurações do Site</h4>
                  </div>
                  <div class="card-body">
      <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance" enctype="multipart/form-data">
        <div class="row">
          <label class="col-sm-2 col-form-label">Nome do site
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="nome_site" class="form-control" value="<?php echo ConfiguracoesSistema('nome_site');?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Tema admin
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                            <select name="tema_admin" class="selectpicker" data-style="select-with-transition" title="Tema do Admin" data-size="7">
                                  <option <?php echo (ConfiguracoesSistema('tema_admin') == "white" ? 'selected' : ''); ?> value="white">Branco</option>
                                  <option <?php echo (ConfiguracoesSistema('tema_admin') == "black" ? 'selected' : ''); ?> value="black">Preto</option>
                                  <option <?php echo (ConfiguracoesSistema('tema_admin') == "red" ? 'selected' : ''); ?> value="Red">Vermelho</option>
                                </select>                    
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Tema Cliente
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                            <select name="tema_cliente" class="selectpicker" data-style="select-with-transition" title="Tema do Cliente" data-size="7">
                                  <option <?php echo (ConfiguracoesSistema('tema_cliente') == "white" ? 'selected' : ''); ?> value="white">Branco</option>
                                  <option <?php echo (ConfiguracoesSistema('tema_cliente') == "black" ? 'selected' : ''); ?> value="black">Preto</option>
                                  <option <?php echo (ConfiguracoesSistema('tema_cliente') == "red" ? 'selected' : ''); ?> value="Red">Vermelho</option>
                                </select>                    
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Logo do site
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
             <input type="file" name="logo" style="opacity: 100; position: initial;" class="form-control">

            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Favicon
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
             <input type="file" name="favicon" style="opacity: 100; position: initial;" class="form-control">

            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Máximo de CPF por conta
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="maximo_cpfs" class="form-control" value="<?php echo ConfiguracoesSistema('maximo_cpfs');?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Patrocinador Padrão
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="login_patrocinador" class="form-control" value="<?php echo ConfiguracoesSistema('login_patrocinador');?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label text-info">Bankon Token
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                    <input type="text" name="bankon_token" class="form-control" value="<?php echo ConfiguracoesSistema('bankon_token');?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label text-info">Conta Bankon
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                    <input type="text" name="bankon_conta" class="form-control" value="<?php echo ConfiguracoesSistema('bankon_conta');?>" required>
                    <small class="text-muted">não é preciso usar o "@"</small>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Coinpayments Public Key
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                    <input type="text" name="coinpayments_public" class="form-control" value="<?php echo ConfiguracoesSistema('coinpayments_public');?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Coinpayments Private Key
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                    <input type="text" name="coinpayments_private" class="form-control" value="<?php echo ConfiguracoesSistema('coinpayments_private');?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Coinpayments Secret Key
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                     <input type="text" name="coinpayments_secret" class="form-control" value="<?php echo ConfiguracoesSistema('coinpayments_secret');?>" required>
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
