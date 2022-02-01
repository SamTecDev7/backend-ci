<div class="row" style="opacity: unset;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-success">
                <h4 class="card-title ">Calculadora de juros compostos</h4>
                <div class="card-icon">
                    <i class="fa fa-money fa-2x">
                    </i>
                </div>
            </div>          
            <form class="card-body" action="" method="POST">
                <?php if (isset($message)) echo $message; ?>

                <label class="col-sm-3 control-label">
                    <b>Valor</b>
                </label>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" id="valor"  name="valor" class="form-control u-rounded" value="50,00" placeholder="50,00" required="">
                    </div>
                </div>
                <label class="col-sm-3 control-label">
                    <b>Quantidade de meses
                    </b>
                </label>
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="form-group bmd-form-group">
                            <select name="meses" class="form-control" required>
                                <?php
                                for ($i = 1; $i <= 24; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>                        
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;
                    </label>
                    <div class="col-sm-6">
                        <button type="submit" name="submit" value="submit" class="btn btn-success">
                            <i class="fa fa-check">
                            </i> Calcular
                        </button>
                    </div>
                </div>
            </form>
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