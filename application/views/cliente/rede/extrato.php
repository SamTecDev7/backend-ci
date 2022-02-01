<div class="row">
              <div class="col-md-12">
                <div class="card LetrasAzul">
                  <div class="card-header card-header-icon card-header-warning">
                    <h4 class="card-title" style="color: #07c1e7">EXTRATO DE PONTUAÇÂO</h4>
                    <div class="card-icon">
                      <i class="fa fa-at fa-2x"></i>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-white">
                          <tr><th>
                            ID
                          </th>
                          <th>
                            Descrição
                          </th>
                          <th>
                            Quantidade de pontos
                          </th>
                          <th>
                            Data
                          </th>
                        </tr></thead>
                        <tbody>
                                                <?php
                                          if($extratos !== false){
                                            foreach($extratos as $extrato){
                                          ?>
                                          <tr style="color: #07c1e7">
                                              <td>
                                                  <?php echo $extrato->id;?>
                                              </td>
                                              <td>
                                                  <?php echo $extrato->mensagem;?>
                                              </td>
                                              <td>
                                                  + <?php echo number_format($extrato->pontos, 0, "", ".");?>
                                              </td>
                                              <td>
                                                  <?php echo date('d/m/Y', strtotime($extrato->data));?>
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