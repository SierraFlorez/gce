<div class="modal fade" id="modalCuentaContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background: #1D3E5C;">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Detalles de Contacto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          {{-- Input del documento --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">Documento</label>
          <input type="text"  id="documento_contacto" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          {{-- Input de los nombres --}}
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nombre</label>
          <input type="text" id="nombre_contacto" class="form-control validate">
        </div>
       
        <div class="md-form mb-4">
          {{-- Input del correo --}}
            <i class="fas fa-envelope prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
            <input type="text" id="email_contacto" class="form-control validate">
        </div>
        <div class="md-form mb-4">
            <i class="fas fa-phone"></i>
            {{-- Input del telefono --}}
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
            <input type="text" id="telefono_contacto" class="form-control validate">
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-secondary" id="updateContactoCuenta">Editar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function (){
          $('.documento_user').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
        });
</script>