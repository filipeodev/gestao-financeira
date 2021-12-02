<?php if(!class_exists('Rain\Tpl')){exit;}?><?php $title="Detalhes"; ?>


<?php require $this->checkTemplate("header-3");?>


    <?php if( $msS != '' ){ ?>

      <script>
        swal({
          title: '<?php echo htmlspecialchars( $msS, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
            text: ,
            icon: "success",
        });
      </script>
    <?php } ?>


    <?php if( $msE != '' ){ ?>

      <script>
        swal({
          title: 'Algo não está certo',
            text: '<?php echo htmlspecialchars( $msE, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
            icon: "error",
        });
      </script>
    <?php } ?>



    <div class="main-panel">
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

          <div class="btn-voltar">
            <a href="/categoria/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Financas">
              <span class="material-icons">
                arrow_back
              </span>
              Voltar
            </a>
          </div>
          <div class="row">
            <div class="col-xl-12 col-md-12">
              <div class="centralize">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Orçamento</h4>
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table table-hover">
                        <thead class="text-warning">
                          <th>Receita</th>
                          <th>Despesa(s)</th>
                          <th>Saldo Total</th>
                        </thead>
                        <tbody>
                          <tr>
                            <?php $counter1=-1;  if( isset($todosProdServCategoria) && ( is_array($todosProdServCategoria) || $todosProdServCategoria instanceof Traversable ) && sizeof($todosProdServCategoria) ) foreach( $todosProdServCategoria as $key1 => $value1 ){ $counter1++; ?>

                            <td class="saldo-verde"><small>R$ </small><?php if( $value1["receita"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["receita"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></td>
                            <td class="saldo-verde"><small>R$ </small><?php if( $value1["despesa"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></td>
                            <?php if( $value1["saldo"] < 0 ){ ?>

                            <td class="saldo-vermelho">
                              <small>R$ </small><?php if( $value1["saldo"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["saldo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>

                            </td>
                            <?php }else{ ?>

                            <td class="saldo-verde">
                              <small>R$ </small><?php if( $value1["saldo"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["saldo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>

                            </td>
                            <?php } ?>

                            <?php } ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- <div class="card card-stats card-categoria">
                    <div class="card-header card-header-warning card-header-icon">
                      <?php $counter1=-1;  if( isset($todosProdServCategoria) && ( is_array($todosProdServCategoria) || $todosProdServCategoria instanceof Traversable ) && sizeof($todosProdServCategoria) ) foreach( $todosProdServCategoria as $key1 => $value1 ){ $counter1++; ?>

                      <p class="card-category">Receita</p>
                      <h3 class="card-title saldo-verde">
                        <small>R$ </small><?php if( $value1["receita"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["receita"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>

                      </h3>
                      <p class="card-category">Despesa(s)</p>
                      <h3 class="card-title saldo-verde">
                        <small>R$ </small><?php if( $value1["despesa"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>

                      </h3>
                      <p class="card-category">Saldo Total</p>
                      <?php if( $value1["saldo"] < 0 ){ ?>

                      <h3 class="card-title saldo-vermelho">
                        <small>R$ </small><?php if( $value1["saldo"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["saldo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>

                      </h3>
                      <?php }else{ ?>

                      <h3 class="card-title saldo-verde">
                        <small>R$ </small><?php if( $value1["saldo"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["saldo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>

                      </h3>
                      <?php } ?>

                      <?php } ?>

                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row table-detalhes">
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Receita</h4>
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table table-hover">
                        <thead class="text-warning">
                          <th>Primeira parcela</th>
                          <th>Segunda parcela</th>
                          <th>Alimentação</th>
                          <th>Bônus</th>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($retornaReceiraUser) && ( is_array($retornaReceiraUser) || $retornaReceiraUser instanceof Traversable ) && sizeof($retornaReceiraUser) ) foreach( $retornaReceiraUser as $key1 => $value1 ){ $counter1++; ?>

                          <tr>
                            <td>R$ <?php echo htmlspecialchars( $value1["primeira_parc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>R$ <?php echo htmlspecialchars( $value1["segunda_parc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>R$ <?php echo htmlspecialchars( $value1["alimentacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>R$ <?php echo htmlspecialchars( $value1["bonus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6">

              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Despesa<span class="despesa-s">(s)</span></h4>
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table table-hover">
                        <thead class="text-warning">
                          <th>Produto/Serviço</th>
                          <th>Valor R$</th>
                          <th>Data da compra</th>
                          <th>Editar</th>
                          <th>Deletar</th>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($retornaDespesaUser) && ( is_array($retornaDespesaUser) || $retornaDespesaUser instanceof Traversable ) && sizeof($retornaDespesaUser) ) foreach( $retornaDespesaUser as $key1 => $value1 ){ $counter1++; ?>

                          <?php if( $value1["paga_s_n"] === 's' ){ ?>

                          <tr style="text-decoration: line-through;">
                          <?php }else{ ?>

                          <tr>
                          <?php } ?>

                            <td><?php echo htmlspecialchars( $value1["despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>R$ <?php echo htmlspecialchars( $value1["valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo formatDate($value1["data_compra"]); ?></td>
                            <td>
                              <a href="/alterar-despesa/<?php echo htmlspecialchars( $value1["id_conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id_despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="edit-icon" title="Alterar Despesa">
                                <span class="material-icons">
                                  mode_edit
                                </span>
                              </a>
                            </td>
                            <td>
                              <a href="/deletar-despesa/<?php echo htmlspecialchars( $value1["id_conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id_despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="delete-icon" title="Deletar Despesa">
                                <span class="material-icons">
                                  delete
                                </span>
                              </a>
                            </td>
                          </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          

        </div>
      </div>

      <div class="btn-adicionar-2">
        <?php if( $detalheTemReceira === 1 ){ ?>

          <a href="/alterar-receita/<?php echo htmlspecialchars( $id_conta, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idReceita, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Receita">
        <?php }else{ ?>

          <a href="/receita/<?php echo htmlspecialchars( $id_conta, ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Receita">
        <?php } ?>

          <span class="material-icons">
            assignment
          </span>
        </a>
      </div>

      <div class="btn-adicionar">
        <a href="/despesa/<?php echo htmlspecialchars( $id_conta, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Despesa">
          <span class="material-icons">
            next_week
          </span>
        </a>
      </div>
  <?php require $this->checkTemplate("footer-3");?>