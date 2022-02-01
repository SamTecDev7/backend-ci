<div class="row">
              <div class="col-md-12">
                <div class="card LetrasAzul">
                  <div class="card-header card-header-icon card-header-success">
                    <h4 class="card-title" style="color: #07c1e7">MEUS PONTOS</h4>
                    <div class="card-icon">
                        <i class="fa fa-money fa-2x"></i>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <h3>Pontos de Hoje</h3>
                            <div class="table-responsive">
                            <table class="table responsive-data-table table-striped ">
                                <thead class="text-white">
                                <tr>
                                    <th>
                                        Esquerdo
                                    </th>
                                    <th>
                                        Direito
                                    </th>
                                    <th>
                                        <b>Total</b>
                                    </th>
                                </tr>
                                </thead>
                                <tbody style="color: #07c1e7">
                                <tr>
                                    <td>
                                        <?php echo number_format($pontos['hoje']['esquerdo'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['hoje']['direito'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['hoje']['esquerdo'] + $pontos['hoje']['direito'], 0, ".", ".");?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                                </div>
                          </div>

                          <div class="col-md-4 text-center">
                            <h3>Pontos já Transferidos</h3>
                            <div class="table-responsive">
                            <table class="table responsive-data-table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Esquerdo
                                    </th>
                                    <th>
                                        Direito
                                    </th>
                                    <th>
                                        <b>Total</b>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <?php echo number_format($pontos['total']['esquerdo'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['total']['direito'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['total']['esquerdo'] + $pontos['total']['direito'], 0, ".", ".");?>
                                    </td>
                                </tr>
                                </tbody>
                            </table></div>
                          </div>
                          
                          <div class="col-md-4 text-center">
                            <h3>Pontos a Transferir</h3>
                            <div class="table-responsive">
                            <table class="table responsive-data-table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Esquerdo
                                    </th>
                                    <th>
                                        Direito
                                    </th>
                                    <th>
                                        <b>Total</b>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <?php echo number_format($pontos['transferir']['esquerdo'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['transferir']['direito'], 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($pontos['transferir']['esquerdo'] + $pontos['transferir']['direito'], 0, ".", ".");?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                                </div>
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
s1.src='https://embed.tawk.to/5faebd460863900e88c86f11/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

