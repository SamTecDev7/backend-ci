<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="fa fa-file-text-o fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Adicionar método de pagamento</h4>
                  </div>
    <div class="card-body ">
      <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance">
          
        <div class="row">
          <label class="col-sm-2 col-form-label" style="padding:10px;">Tipo de conta
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tipo"  value="1" >
                            Conta Bancária
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          
                
                </div>
            </div>
          </div>
        </div>
          
                   

          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Banco
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <select name="banco" class="selectpicker" data-style="select-with-transition" title="Banco">
                     <?php
                      foreach(Bancos() as $banco){
                            echo '<option value="'.$banco['code'].'">'.$banco['code'].' - '.$banco['name'].'</option>';
                        }
                     ?>
                </select>
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Agencia
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
               <input type="text" name="agencia" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Conta
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input type="text" name="conta" class="form-control">
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Operação (opcional)
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input type="text" name="operacao" class="form-control">
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label" style="padding:10px;">Tipo de Conta
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tipo_conta"  value="1" >
                            Conta Corrente
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tipo_conta" value="2">
                            Conta Poupança
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                
                </div>
                </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Titular
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="titular" class="form-control">
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">CPF/CNPJ
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                  <input type="text" name="documento" class="form-control">
            </div>
          </div>
        </div>
          
          
         <div class="row" id="box_bitcoin" style="display:none;">
          <label class="col-sm-2 col-form-label">Carteira
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input type="text" name="carteira" class="form-control">
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">&nbsp;
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Adicionar Pagamento">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
</div>
