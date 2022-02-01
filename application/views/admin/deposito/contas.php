<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="fa fa-file-text-o fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Contas para Pagamento</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <a href="<?php echo base_url('admin/deposito/adicionar');?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nova conta para pagamento</a>

                      <table class="table">
                        <thead class=" text-primary">
                        <tr>
                                  <th>
                                      Deposito em
                                  </th>
                                  <th>
                                      &nbsp;
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($contas !== false){
                                foreach($contas as $conta){
                              ?>
                              <tr>
                                  <td>
                                      <?php
                                      if($conta->categoria_conta == 1){
                                        echo BancoPorID($conta->banco);
                                      }else{
                                        echo 'Bitcoin';
                                      }
                                      ?>
                                  </td>
                                  <td>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/deposito/editar/'.$conta->id);?>"><i class="fa fa-pencil"></i> Editar</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/deposito/excluir/'.$conta->id);?>"><i class="fa fa-times"></i> Excluir</a>
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