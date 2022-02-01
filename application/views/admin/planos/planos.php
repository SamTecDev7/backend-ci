<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-tree fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Planos</h4>
                  </div>
                  <div class="card-body">
                          <a href="<?php echo base_url('admin/planos/adicionar');?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo Plano</a>

                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                        <tr>
                                  <th>
                                      Nome
                                  </th>
                                  <th>
                                      Binário
                                  </th>
                                  <th>
                                      Plano de Carreira
                                  </th>
                                  <th>
                                      Teto binário
                                  </th>
                                  <th>
                                      Ganhos diários
                                  </th>
                                  <th>
                                      Valor
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
                                      R$ <?php echo number_format($plano->valor, 2, ',', '.'); ?> em contas
                                  </td>
                                  <td>
                                      <?php echo $plano->binario;?>%
                                  </td>
                                  <td>
                                      <?php echo $plano->plano_carreira;?> pontos
                                  </td>
                                  <td>
                                      R$ <?php echo number_format($plano->teto_binario, 2, ",", ".");?>
                                  </td>
                                  <td>
                                      R$ <?php echo number_format($plano->ganhos_diarios, 2, ",", ".");?>
                                  </td>
                                  <td>
                                      R$ <?php echo number_format($plano->valor, 2, ",", "."); ?>
                                  </td>
                                  <td>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/planos/editar/'.$plano->id);?>"><i class="fa fa-pencil"></i> Editar</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/planos/excluir/'.$plano->id);?>"><i class="fa fa-times"></i> Excluir</a>
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