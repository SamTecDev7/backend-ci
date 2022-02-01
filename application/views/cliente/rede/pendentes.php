<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-danger">
                    <h4 class="card-title ">Indicados Pendentes</h4>
                    <div class="card-icon">
                      <i class="fa fa-envelope fa-2x"></i>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <tr><th>
                            Nome
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Celular
                          </th>
                          <th>
                            Data do cadastro
                          </th>
                        </tr></thead>
                        <tbody>
                              <?php
                              if($pendentes !== false){
                                foreach($pendentes as $pendente){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $pendente->nome;?>
                                  </td>
                                  <td>
                                      <?php echo $pendente->email;?>
                                  </td>
                                  <td>
                                      <?php echo $pendente->celular;?>
                                  </td>
                                  <td>
                                      <?php echo date('d/m/Y H:i:s', strtotime($pendente->data_cadastro));?>
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->