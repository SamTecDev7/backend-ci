<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="fa fa-file-text-o fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Visualizar Saque</h4>
                  </div>
                  <div class="card-body">
                    <div class="table">
                    <div class="panel-body">
                          
                          <?php
                          if($saque->status == 0){
                          ?>
                          <div class="text-center">
                            <button class="btn btn-success" id="MarcarComoPago" value="<?php echo $this->uri->segment(4);?>"><i class="fa fa-check"></i> Marcar como Pago</button>
                            <button class="btn btn-danger" id="Estornar" value="<?php echo $this->uri->segment(4);?>"><i class="fa fa-times"></i> Estornar</button>
                          </div>
                              <?php
                          }
                          ?>

                          <div class="row">
                            <div class="col-sm-6">
                              <h3 class="text-center text-uppercase">Dados do Saque</h3>
                              <table class="table table-striped">
                                <tr>
                                  <td>Login</td>
                                  <td><?php echo InformacoesUsuario('login', $saque->id_usuario);?></td>
                                </tr>
                                <tr>
                                  <td>Saque via</td>
                                  <td><b><?php echo ucwords($saque->tipo_saque);?></b></td>
                                </tr>
                                <tr>
                                  <td>Chave</td>
                                  <td>
                                    <b><?php echo $saque->local_recebimento;?></b>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Valor</td>
                                  <td><b>USD <?php echo number_format($saque->valor, 2, ".", ",");?></b></td>
                                </tr>
                                <tr>
                                  <td>Tipo de saldo</td>
                                  <td><b><?php echo ($saque->origem == 'Bonus') ? 'Bônus' : $saque->origem;?></b></td>
                                </tr>
                                <tr>
                                  <td>Status</td>
                                  <td>
                                    <?php
                                      if($saque->status == 0){
                                        echo '<span class="text-warning">Pendente</span>';
                                      }elseif($saque->status == 1){
                                        echo '<span class="text-success">Pago</span>';
                                      }else{
                                        echo '<span class="text-danger">Estornado</span>';
                                      }
                                      ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Pedido feito em</td>
                                  <td><?php echo date('d/m/Y H:i:s', strtotime($saque->data_pedido));?></td>
                                </tr>
                              </table>
                            </div>
                            <div class="col-sm-6">
                              <h3 class="text-center text-uppercase">Dados para Confimação</h3>
                              <table class="table table-striped">
                                <tr>
                                    <td>Titular da conta</td>
                                    <td><b><?php echo InformacoesUsuario('nome');?></b></td>
                                </tr>
                              </table>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>