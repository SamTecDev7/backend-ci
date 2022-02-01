<div class="row">
    <body style="background-image: url(https://lifetrader.company/back/forex.jpg)">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-money fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Saque</h4>
                  </div>
                  <div class="card-body">


                          <div class="form-group text-center">
                                <h4>O que deseja sacar?</h4>
                                <div class="col-sm-12">
                                    

                                    <a href="<?php echo base_url('saquerendimento');?>" class="btn btn-success btn-lg" role="button">Rendimento <b>(R$ <?php echo number_format(InformacoesUsuario('saldo'), 2, ",", ".");?>)</b></a>
                        
</div>

                                
                    
                    
                              <!--<div class="form-group">
                                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#new_carteira" style="margin-right:20px;"><i class="fa fa-bitcoin"></i> Cadastrar carteira bitcoin</button>!-->
                                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#new_mibank" style="margin-right:20px;"><i class="fa fa-dollar"></i> Cadastrar conta Urpay</button>
                            </div>

                          </div>
                                              </div>
                  </div>

                    
                    
                    
                </div>
              </div>
            </div>






<!-- Modal -->
<div class="modal fade" id="new_carteira" tabindex="-1" role="dialog" aria-labelledby="newCarteiraLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <font color="orange">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newCarteiraLabel"><i class="fa fa-bitcoin"></font></i><font color="red"> Adicionar nova carteira bitcoin</h4>
      </div>
      <div class="modal-body">
        
        <p class="text-center">Por favor, preenche os campos abaixo para cadastrar uma nova carteira bitcoin</p></font>
        
        <form class="form-horizontal form-variance">

        
        <div class="form-group">
          <label>Carteira Bitcoin</label>
          <div class="col-sm-9">
            <br><input type="text" class="form-control u-rounded" id="carteira_bitcoin_input" placeholder="Endereço da carteira bitcoin">
            <span class="help-text text-danger" id="errorCarteiraBitcoin"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="col-sm-6">
            <button type="button" class="btn btn-success" id="cadastrar_carteira_bitcoin"><i class="fa fa-plus"></i> Adicionar Carteira Bitcoin</button>
          </div>
        </div>

        </form>

        <div class="clearfix"></div>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="new_mibank" tabindex="-1" role="dialog" aria-labelledby="newMibankLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <font color="green">
        <h4 class="modal-title" id="newMibankLabel"><i class="fa fa-dollar"></font></i> <font color="red">Adicionar nova conta Urpay</h4>
      </div>
      <div class="modal-body">
        
        <p class="text-center">Por favor, preenche os campos abaixo para cadastrar uma nova conta Urpay</p></font>
        
        <form class="form-horizontal form-variance">

        
        <div class="form-group">
          <label class="col-sm-3 control-label">Urpay</label>
          <div class="col-sm-9">
            <br><input type="text" class="form-control u-rounded" id="mibank_input" placeholder="Conta Urpay">
            <span class="help-text text-danger" id="errorMibank"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="col-sm-6">
            <button type="button" class="btn btn-success" id="cadastrar_mibank"><i class="fa fa-plus"></i> Adicionar Urpay</button>
          </div>
        </div>

        </form>

        <div class="clearfix"></div>

      </div>
    </div>
  </div>
</div>

