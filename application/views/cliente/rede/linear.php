<div class="row">
              <div class="col-md-12">
                <div class="card LetrasAzul">
                  <div class="card-header card-header-icon card-header-success">
                    <h4 class="card-title" style="color: #07c1e7">REDE LINEAR</h4>
                    <div class="card-icon">
                      <i class="fa fa-envelope fa-2x"></i>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                              <?php
                              if(!empty($linear)){
                                foreach($linear as $linear){
                              ?>
                              <?php $pts = $this->db->query('SELECT SUM(`pontos`) AS pontos FROM `rede_pontos_binario` WHERE `id_usuario` = ' . InformacoesUsuario('id') . ' AND `id_receb` = ' . $linear->id . '')->row()->pontos ?>
                              <tr>
                                  <td>
                                      <?php echo '<big style="white-space: nowrap; color: white;">' . limita_caracteres($linear->nome, 12) . '</big><br>'; ?>
                                      <?php echo (PlanoAtivo($linear->id)) ? '<small style="color: #07c1e7;">Ativo</small>' : '<small style="color: #FFFF00;">Inativo</small>'; ?>
                                  </td>
                                  <td style="text-align: right;">
                                      <?php echo '<small style="color: white";>' . $linear->nivel . '°Nivel</small><br>';?>
                                      <?php echo '<small style="white-space: nowrap; color: white;">' . number_format($this->db->query('SELECT SUM(`valor`) AS valor FROM `extrato` WHERE `mensagem` LIKE "Bônus de indicação%" AND `id_usuario` = ' . InformacoesUsuario('id') . ' AND `id_remetente` = ' . $linear->id . '')->row()->valor, 2, ".", ",") . ' $  ' . (($linear->nivel == '1') ? (($pts == '') ? "- 0 Pontos" : '- ' . $pts . ' Pontos') : '') . ' </small>';?>
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
<?php
  function limita_caracteres($texto, $limite, $quebra = true){
    $tamanho = strlen($texto);
    if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
        $novo_texto = $texto;
    }else{ // Se o tamanho do texto for maior que o limite
        if($quebra == true){ // Verifica a opção de quebrar o texto
          $novo_texto = trim(substr($texto, 0, $limite))."...";
        }else{ // Se não, corta $texto na última palavra antes do limite
          $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
          $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto até a posição localizada
        }
    }
    return $novo_texto; // Retorna o valor formatado
  }
?>