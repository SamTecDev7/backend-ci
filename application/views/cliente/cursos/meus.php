<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <h4 class="card-title ">Meus Cursos</h4>
                    <div class="card-icon">
                      <i class="fa fa-file-video-o fa-3x"></i>
                    </div>
                  </div>
                  <div class="card-body">
    <?php if($this->session->userdata('message_curso')): ?>
    <div class="alert alert-success text-center">
        <?php echo $this->session->userdata('message_curso'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php $this->session->unset_userdata('message_curso'); endif; ?>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr>
                            <th>
                              Curso
                            </th>
                            <th>
                              Descrição
                            </th>
                            <th>
                              Vídeo
                            </th>
                        </tr></thead>
                        <tbody>
                              <?php
                              if($cursos !== false):
                                foreach($cursos as $curso):
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $curso->nome;?>
                                  </td>
                                  <td>
                                      <?php echo mb_substr($curso->texto, 0, 80) ?>
                                  </td>
                                  <td>
                                    <a href="#" data-toggle="modal" data-target="#video_<?php echo $curso->id;?>" class="text-success">Assistir Vídeo</a>
                                  </td>
                              </tr>
                              <?php
                                 endforeach;
                                 endif;
                              ?>
                              </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>


<?php 
if($cursos !== false): 
    foreach($cursos as $curso):
?>
        <div class="modal fade" id="video_<?php echo $curso->id;?>" tabindex="-1" role="dialog" aria-labelledby="videoLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php echo $curso->link;?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>                            
                </div>       
                  <hr>
                  <p class="text-dark"><?php echo $curso->texto; ?></p>
            </div>
          </div>
    </div>
<?php
    endforeach;
    endif;
?>