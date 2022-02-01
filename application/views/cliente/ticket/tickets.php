<div class="row">
              <div class="col-md-12">
                <div class="card LetrasAzul">
                  <div class="card-header card-header-icon card-header-warning">
                    <h4 class="card-title" style="color: #07c1e7">SUPORTE</h4>
                    
                  <a href="<?php echo base_url('ticket/abrir');?>" class="btn pull-right" style="background: #07c1e7; color: white">NOVO TICKET</a>
                  </div>
                          <?php
                          if($this->session->userdata('message_show_tickets')){
                            echo $this->session->userdata('message_show_tickets').'<br />';
                            $this->session->unset_userdata('message_show_tickets');
                          }
                          ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-white">
                          <tr><th>
                            #
                          </th>
                          <th>
                            Assunto
                          </th>
                          <th>
                            Última atualização
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            &nbsp;
                          </th>
                        </tr></thead>
                        <tbody>
                              <?php
                              if($tickets !== false){
                                foreach($tickets as $ticket){
                              ?>
                              <tr>
                                  <td>
                                      <a href="<?php echo base_url('ticket/visualizar/'.$ticket->id);?>">#<?php echo $ticket->id;?></a>
                                  </td>
                                  <td>
                                      <?php echo $ticket->assunto;?>
                                  </td>
                                  <td>
                                      <?php echo date('d/m/Y H:i:s', strtotime($ticket->ultima_atualizacao));?>
                                  </td>
                                  <td>
                                      <?php
                                      switch($ticket->status){

                                        case 1:
                                          echo '<span class="text-warning">Esperando resposta do suporte</span>';
                                        break;

                                        case 2:
                                          echo '<span class="text-success">Respondido pelo suporte</span>';
                                        break;

                                        case 3:
                                          echo '<span class="text-danger">Fechado</span>';
                                        break;
                                      }
                                      ?>
                                  </td>
                                  <td>
                                  <a href="<?php echo base_url('ticket/visualizar/'.$ticket->id);?>">Visualizar</a>
                                  <?php
                                  if($ticket->status != 3){
                                    echo ' | <a href="'.base_url('ticket/fechar/'.$ticket->id).'">Fechar Ticket</a>';
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