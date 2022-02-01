<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="fa fa-bell fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Enviar notificações para os usuários</h4>
                  </div>
                  <div class="card-body">
      <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance" enctype="multipart/form-data">
        <div class="row">
          <label class="col-sm-2 col-form-label">Notificação
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <textarea name="notificacao" class="form-control" cols="30" rows="5" required></textarea>
            </div>
          </div>
        </div>


        <div class="row">
          <label class="col-sm-2 col-form-label">&nbsp;
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Enviar Notificações">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
</div>
