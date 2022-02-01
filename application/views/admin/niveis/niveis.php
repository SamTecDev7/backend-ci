<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-info">
                    <div class="card-icon">
                      <i class="fa fa-ioxhost fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Níveis</h4>
                  </div>
                  <div class="card-body">
                      
                  <a href="<?php echo base_url('admin/niveis/adicionar');?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo Nível</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                        <tr>
                                  <th>
                                      Nível
                                  </th>
                                  <th>
                                      Porcentagem
                                  </th>
                                  <th>
                                      &nbsp;
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($niveis !== false){
                                foreach($niveis as $nivel){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $nivel->nivel;?>º
                                  </td>
                                  <td>
                                      <?php echo $nivel->porcentagem;?>%
                                  </td>
                                  <td>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/niveis/editar/'.$nivel->id);?>"><i class="fa fa-pencil"></i> Editar</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/niveis/excluir/'.$nivel->id);?>"><i class="fa fa-times"></i> Excluir</a>
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