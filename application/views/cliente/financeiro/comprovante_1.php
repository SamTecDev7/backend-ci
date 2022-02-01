<div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-success card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Enviar comprovante</h4>
                  </div>
                </div>
                  <div class="card-body ">
<?php
    if(isset($message)) echo $message;
?>
<center><p>Para ativar-mos mais rápido seu plano, envie-nos o comprovante de pagamento de sua fatura</p></center>

           <div class="row">
               <form  action="" method="post" enctype="multipart/form-data">
               <div class="col-sm-12 checkbox-radios">
                       
                          <div class="form-group">
                                <label class="control-label">&nbsp;</label>
             <input type="file" name="comprovante" style="opacity: 100; position: initial;" class="form-control">
                          </div>
                   
                          <div class="form-group">
                                <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="col-sm-6">
                                    <input type="submit" name="submit" class="btn btn-success" value="Enviar comprovante">
                                </div>
                          </div>
                        
                      </div>
           </div>
                    </form>
           </div>
                      </div>
                    </div></div>
                   
                  </form>
