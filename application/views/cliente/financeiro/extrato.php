<div class="row">
    <div class="col-md-12">
      <div class="card LetrasAzul">
        <div class="card-header card-header-icon card-header-warning">
          <h4 class="card-title" style="color: #07c1e7">EXTRATOS</h4>
          <div class="card-icon">
            <i class="fa fa-at fa-2x"></i>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-white">
                <tr><th>
                  #
                </th>
                <th>
                  Descrição
                </th>
                <th>
                  Valor
                </th>
                <th>
                  Data
                </th>
              </tr>
              </thead>
              <tbody>
                  <?php
                    if($extratos !== false){
                      foreach($extratos as $extrato){
                  ?>
                    <tr style="color: #07c1e7">
                        <td>
                            #<?php echo $extrato->id;?>
                        </td>
                        <td>
                            <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'warning';?>"><?php echo $extrato->mensagem;?></span>
                        </td>
                        <td style="white-space: nowrap">
                            <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'warning';?>"><?php echo ($extrato->tipo == 1) ? '+' : '-';?> R$ <?php echo number_format($extrato->valor, 2, ",", ".");?></span>
                        </td>
                        <td style="white-space: nowrap">
                            <?php echo date('d/m/Y H:i:s', strtotime($extrato->data));?>
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
