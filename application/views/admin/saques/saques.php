<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="fa fa-file-text-o fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Saques</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="datatable" class="table">
                        <thead class=" text-primary">
                              <tr>
                                  <th>
                                      Login
                                  </th>
                                  <th>
                            
                                      Valor
                                  </th>
                                  <th>
                                      Status
                                  </th>
                                  <th>
                                      Data do Pedido
                                  </th>
                                  <th>
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($saques !== false){
                                foreach($saques as $saque){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo InformacoesUsuario('login', $saque->id_usuario);?>
                                  </td>
                                  <td>
                               
                                    USD <?php echo number_format($saque->valor, 2, ".", ","); ?>
                                  </td>
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
                                  <td>
                                    <?php echo date('d/m/Y H:i:s', strtotime($saque->data_pedido));?>
                                  </td>
                                  <td>
                                    <a href="<?php echo base_url('admin/saques/visualizar/'.$saque->id);?>">Visualizar</a>
                                  </td>
                              </tr>
                              <?php
                                }
                              }
                              ?>
                              </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>