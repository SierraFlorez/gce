@if (Auth::user() && (Auth::user()->rol_id==1))
{{-- En caso que haya iniciado sesión y sea administrador --}}
<div class="modal fade" id="modalContactos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
          <input type="text"  id="documento_contacto_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          {{-- Input de los nombres --}}
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nombre</label>
          <input type="text" id="nombre_contacto_d" class="form-control validate">
        </div>
       
        <div class="md-form mb-4">
          {{-- Input del correo --}}
            <i class="fas fa-envelope prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
            <input type="text" id="email_contacto_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
            <i class="fas fa-phone"></i>
            {{-- Input del telefono --}}
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
            <input type="text" id="telefono_contacto_d" class="form-control validate">
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-secondary" id="updateContacto">Editar</button>
      </div>
    </div>
  </div>
</div>
@else
{{-- Usuario promedio; para no editar informacion --}}
<div class="modal fade" id="modalContactos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background: #1D3E5C;">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Detalles Del Contacto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white">&times;</span>
        </button>
      </div>
      
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Documento</label>
          <input type="text" readonly id="documento_contacto_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nombre</label>
          <input type="text" readonly="readonly" id="nombre_contacto_d" class="form-control validate">
        </div>
        
        <div class="md-form mb-4">
            <i class="fas fa-envelope prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
            <input type="text" readonly="readonly" id="email_contacto_d" class="form-control validate">
        </div>
        
        <div class="md-form mb-4">
            <i class="fas fa-phone"></i>
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
            <input type="text" readonly="readonly "id="telefono_contacto_d" class="form-control validate">
          </div>
      </div> 
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endif
<script>
    $(document).ready(function (){
          $('.documento_user').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
        });
</script>