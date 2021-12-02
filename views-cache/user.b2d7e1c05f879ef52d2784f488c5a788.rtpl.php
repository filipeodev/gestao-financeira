<?php if(!class_exists('Rain\Tpl')){exit;}?><?php $title="Usuário"; ?>


<?php require $this->checkTemplate("header");?>


    <?php if( $msE != '' ){ ?>

      <script>
        swal({
          title: "Algo não está certo!",
            text: '<?php echo htmlspecialchars( $msE, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
            icon: "error",
        });
      </script>
    <?php } ?>

    <?php if( $msS != '' ){ ?>

      <script>
        swal({
          title: '<?php echo htmlspecialchars( $msS, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
            text: ,
            icon: "success",
        });
      </script>
    <?php } ?>


    <div class="main-panel">
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Editar Portfólio</h4>
                </div>
                <div class="card-body">
                  <form method="post" action="/alterar-usuario" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">E-mail</label>
                          <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars( $usuario["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" autofocus>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nova senha</label>
                          <div class="input-senha">
                            <input type="password" id="senha" name="senha" class="form-control">
                            <i class="material-icons" onclick="textPass()" id="mudarVisual">
                              remove_red_eye
                            </i>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 input-file">
                        <label class="bmd-label-floating">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Alterar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <img class="img" src="res/img-users/<?php echo htmlspecialchars( $usuario["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Minha Foto" title="Minha Foto"/>
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo htmlspecialchars( $usuario["usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <!-- <a href="/admicionar-amigo" class="btn btn-primary btn-round" title="Adicionar amigo">Adicionar amigo</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php require $this->checkTemplate("footer");?>