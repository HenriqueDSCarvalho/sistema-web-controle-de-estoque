 <!-- select do código -->
 <?php
  require "../dao/conexao.php";
  $sql_cliente = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
  $result_cliente = mysqli_query($conexao, $sql_cliente);
  $dados_cliente = mysqli_fetch_array($result_cliente);
  ?>
 <!-- Modal -->
 <div class="modal fade bd-example-modal-lg" id="modal_cadastrar_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_cadastrar_clienteTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div style="background-color:007bff;" class="modal-header">
         <h5 class="modal-title" style="color:white;" id="modal_cadastrar_fornecedorTitle">Cadastrar novo Cliente:</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <!--Formulario-->
         <form method="POST" action="../valida/valida_cadastro_usuarios.php">
           <div class="modal-body">
             <div class="form-group">
               <label for="inputAddress">Nome:</label>
               <input type="text" name="nome_cli" class="form-control" placeholder="Nome" required>

             </div>
             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="inputEmail4">senha:</label>
                 <input type="text" name="identidade" class="form-control" id="cnpj" placeholder="*****" required>
               </div>
             </div>
             <div class="form-row">
               <div class="form-group col-md-2">
                 <label for="data">Código:</label>
                 <input class="form-control" id="data_cadastro" value="<?php echo ($dados_cliente['id'] + 1); ?>" disabled>
               </div>

             </div>
             <div class="form-group">
               <div class="form-check">
                 <input class="form-check-input" type="checkbox" id="gridCheck" required>
                 <label class="form-check-label" for="gridCheck" required>
                   Confirmar Cadastro
                 </label>
               </div>
             </div>
           </div>
       </div>
       <div class="modal-footer">
         <button type="button" style="width:15%;" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
         <button type="submit" style="width:15%;" name="cadastrar_usuarios" class="btn btn-primary"><div style="color:white">Cadastrar</div></button>
       </div>
       </form>
     </div>
   </div>
 </div>
 </form>