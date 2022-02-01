<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-bell fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Notificações para administração</h4>
                  </div>
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/notificacoes');?>" class="btn btn-success pull-right"><i class="fa fa-bell"></i> Enviar notificações</a>

                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                        <tr>
                                  <th>
                                      Notificação
                                  </th>
                                  <th>
                                      Data
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($notificacoes !== false){
                                foreach($notificacoes as $notificacao){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $notificacao->mensagem;?>
                                  </td>
                                  <td>
                                      <?php echo date('d/m/Y H:i:s', strtotime($notificacao->data)); ?>
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