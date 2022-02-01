<div class="row">
    <body style="background-image: url(https://lifetrader.company/back/forex.jpg)">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-money fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Saque Indicação (R$ <?php echo number_format(InformacoesUsuario('saldo_indicacoes'), 2, ",", ".");?>)</h4>
                  </div>
                  <?php


                          if($saque === true){
                        ?>
                  <div class="card-body">
                   <p class="text-center alert alert-success">Para solicitar o saque, informe os campos abaixo. Lembrando que o valor mínimo para saque de indicação é de <b>R$ <?php echo number_format(ConfiguracoesSistema('valor_minimo_saque'), 2, ",", ".");?></b>. Será descontada a taxa de <b><?php echo ConfiguracoesSistema('taxa_saque');?>%</b> sobre o saque. Após solicitar o saque, você poderá visualizar o desconto em seu extrato.</p>

                    <form class="form-horizontal form-variance">
                        <input class="form-check-input d-none" type="checkbox" name="tipo_saque" id="tipo_saque" value="2" checked="">

                                      
                                      
                                      
        <div class="row">
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
<div class="form-check">
                          <!--<label class="form-check-label">
                              <input class="form-check-input" type="radio" name="local_recebimento" id="local_recebimento" value="2" checked="">
                            <b>Minha Carteira Bitcoin</b>
                            <span class="circle">
                              <span class="check"></span>!-->
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="local_recebimento" id="local_recebimento" value="3">
                            <b>Urpay</b>
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                </div>
                <span>Selecione onde você deseja receber essa retirada</span>
            </div>
          </div>
        </div>
                                      
                          <div class="recebimento_carteira">

                            <table class="table table-borderd">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Carteira</th>
                                  <th>&nbsp;</th>
                                </tr>
                              </thead>
                              <tbody id="append_carteira">
                                <?php
                                if($contas_bitcoin !== false){
                                  foreach($contas_bitcoin as $conta_bitcoin){
                                ?>
                                <tr data-id="<?php echo $conta_bitcoin->id;?>">
                                  <td><input type="radio" name="carteira_bitcoin" id="carteira_bitcoin" value="<?php echo $conta_bitcoin->id;?>" /></td>
                                  <td><?php echo $conta_bitcoin->carteira_bitcoin;?></td>
                                  <td>
                                  <button style="float: right;" type="button" class="btn btn-danger" id="delete_carteira" data-id="<?php echo $conta_bitcoin->id;?>"><i class="fa fa-times"></i></button>
                                  </td>
                                </tr>
                                <?php
                                  }
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>

                          <div class="recebimento_mibank" style="display:none">

                            <table class="table table-borderd">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Urpay</th>
                                  <th>&nbsp;</th>
                                </tr>
                              </thead>
                              <tbody id="append_mibank">
                                <?php
                                if($contas_mibank !== false){
                                  foreach($contas_mibank as $conta_mibank){
                                ?>
                                <tr data-id="<?php echo $conta_mibank->id;?>">
                                  <td><input type="radio" name="mibank" id="mibank" value="<?php echo $conta_mibank->id;?>" /></td>
                                  <td><?php echo $conta_mibank->mibank;?></td>
                                  <td>
                                  <button style="float: right;" type="button" class="btn btn-danger" id="delete_mibank" data-id="<?php echo $conta_mibank->id;?>"><i class="fa fa-times"></i></button>
                                  </td>
                                </tr>
                                <?php
                                  }
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                    
                          <div>
                                  <label class="col-sm-3 control-label"><b>Quantidade a Sacar</b></label>

                            <div class="form-group">
                                  <div class="col-sm-6">
                                      <input type="text" id="valor_saque" class="form-control u-rounded" placeholder="100">
                                  </div>
                            </div>

                            <div class="form-group">
                                  <label class="col-sm-3 control-label">&nbsp;</label>
                                  <div class="col-sm-6">
                                      <button type="button" id="solicitar_saque" class="btn btn-success"><i class="fa fa-check"></i> Solicitar Saque</button>
                                  </div>
                            </div>

                          </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>

</div>
                            </div>

                          </div>
                        </form>
                        <?php
                        }else{

                          if($dias_saques !== false){

                            echo '<h5>DIAS E HORÁRIOS PARA SOLICITAÇÃO DE SAQUES</h5>';

                            foreach($dias_saques as $dias){

                              echo '<p class="label label-info">- '.ExibeDiaSemanaById($dias->dia_pagamento).' das <b>'.$dias->horario_inicio.'</b> às <b>'.$dias->horario_termino.'</b></p> <br />';
                            }
                          }

                          echo '<br /><div class="alert alert-info text-center">Desculpe, mas no momento o saque está indisponível. Verifique as datas e horários para solicitações dos saques.</div>';
                        }
                        ?>
                        </div>
                    </section>
                </div>
            </div>

        </div>

    </div>
</div>
<!--main content end-->

<!-- Modal -->
<div class="modal fade" id="new_bank" tabindex="-1" role="dialog" aria-labelledby="newBankLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newBankLabel"><i class="fa fa-bank"></i> Adicionar nova conta bancária</h4>
      </div>
      <div class="modal-body">
        <p class="text-center">Por favor, preenche os campos abaixo para cadastrar uma nova conta bancária</p>
        
        <form class="form-horizontal form-variance">

        <div class="form-group">
          <label class="col-sm-3 control-label">Banco</label>
          <div class="col-sm-9">
            <select id="banco" class="form-control">
            <?php
            foreach(Bancos() as $banco){
              echo '<option value="'.$banco['code'].'">'.$banco['code'].' - '.$banco['name'].'</option>';
            }
            ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Agência</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-8">
                <input type="text" class="form-control u-rounded" id="agencia_numero" placeholder="número">
                <span class="help-text text-danger" id="errorAgencyNumber"></span>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control u-rounded" id="agencia_digito" placeholder="digito">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Conta</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-8">
                <input type="text" class="form-control u-rounded" id="conta_numero" placeholder="número">
                <span class="help-text text-danger" id="errorAccountNumber"></span>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control u-rounded" id="conta_digito" placeholder="digito">
                <span class="help-text text-danger" id="errorAccounDigit"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Tipo</label>
          <div class="col-sm-9">
            <select id="tipo_conta" class="form-control">
              <option value="1">Conta Corrente</option>
              <option value="2">Conta Poupança</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Operação <sup>(opcional)</sup></label>
          <div class="col-sm-9">
            <input type="text" class="form-control u-rounded" id="operacao" placeholder="ex: 013">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Titular</label>
          <div class="col-sm-9">
            <div class="row">
                <input type="text" class="form-control u-rounded" id="titular" placeholder="nome do titular da conta">
                <span class="help-text text-danger" id="errorTitular"></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">CPF/CNPJ</label>
          <div class="col-sm-9">
            <div class="row">
                <input type="text" class="form-control u-rounded" id="documento" placeholder="CPF/CNPJ do titular da conta">
                <span class="help-text text-danger" id="errorDocument"></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="col-sm-6">
            <button type="button" class="btn btn-success" id="cadastrar_conta_bancaria"><i class="fa fa-plus"></i> Adicionar Conta Bancária</button>
          </div>
        </div>

        </form>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="new_carteira" tabindex="-1" role="dialog" aria-labelledby="newCarteiraLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="newCarteiraLabel"><i class="fa fa-bitcoin"></i> Adicionar nova carteira bitcoin</h4>
      </div>
      <div class="modal-body">
        
        <p class="text-center">Por favor, preenche os campos abaixo para cadastrar uma nova carteira bitcoin</p>
        
        <form class="form-horizontal form-variance">

        
        <div class="form-group">
          <label class="col-sm-3 control-label">Carteira Bitcoin</label>
          <div class="col-sm-9">
            <input type="text" class="form-control u-rounded" id="carteira_bitcoin_input" placeholder="endereço da carteira bitcoin">
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
        <h4 class="modal-title" id="newMibankLabel"><i class="fa fa-dollar"></i> Adicionar nova conta Mibank</h4>
      </div>
      <div class="modal-body">
        
        <p class="text-center">Por favor, preenche os campos abaixo para cadastrar uma nova conta Mibank</p>
        
        <form class="form-horizontal form-variance">

        
        <div class="form-group">
          <label class="col-sm-3 control-label">Mibank</label>
          <div class="col-sm-9">
            <input type="text" class="form-control u-rounded" id="mibank_input" placeholder="conta Mibank">
            <span class="help-text text-danger" id="errorMibank"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="col-sm-6">
            <button type="button" class="btn btn-success" id="cadastrar_mibank"><i class="fa fa-plus"></i> Adicionar Mibank</button>
          </div>
        </div>

        </form>

        <div class="clearfix"></div>

      </div>
    </div>
  </div>
</div>
