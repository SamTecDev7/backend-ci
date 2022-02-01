<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-camera fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Cursos</h4>
                  </div>
                  <div class="card-body">
                          <a href="<?php echo base_url('admin/cursos/adicionar');?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo Plano</a>

                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                        <tr>
                                  <th>
                                      Nome
                                  </th>
                                  <th>
                                      Descrição
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
                              if($cursos !== false){
                                foreach($cursos as $curso){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $curso->nome;?>
                                  </td>
                                  <td>
                                      <?php echo mb_substr($curso->texto, 0, 60) ?>
                                  </td>
                                  <td>
                                      R$ <?php echo number_format($curso->valor, 2, ",", ".");?>
                                  </td>
                                  <td>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/cursos/editar/'.$curso->id);?>"><i class="fa fa-pencil"></i> Editar</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/cursos/excluir/'.$curso->id);?>"><i class="fa fa-times"></i> Excluir</a>
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