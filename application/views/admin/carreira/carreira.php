<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-tree fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Planos de Carreira</h4>
                  </div>
                  <div class="card-body">
                          <a href="<?php echo base_url('admin/carreira/adicionar');?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo Plano de Carreira</a>

                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                        <tr>
                                  <th>
                                      Nome
                                  </th>
                                  <th>
                                      Pontos
                                  </th>
                                  <th>
                                      Descrição
                                  </th>
                                  <th>
                                      &nbsp;
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($planos !== false){
                                foreach($planos as $plano){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $plano->nome;?>
                                      <?php
                                      if($plano->id == 1){
                                        echo '<br><small>(Esse plano é o inicial e por isso não pode ser excluído)</small>';
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php echo $plano->pontos;?>
                                  </td>
                                  <td>
                                      <?php echo $plano->premio;?>
                                  </td>
                                  <td>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/carreira/editar/'.$plano->id);?>"><i class="fa fa-pencil"></i> Editar</a>
                                    
                                    <?php
                                    if($plano->id != 1){
                                    ?>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/carreira/excluir/'.$plano->id);?>"><i class="fa fa-times"></i> Excluir</a>
                                    <?php
                                    }
                                    ?>
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