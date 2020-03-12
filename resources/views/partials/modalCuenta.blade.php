{{-- Modal Detalles de cuenta --}}
<div class="modal fade" id="modalCuenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" --}}
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background: #1D3E5C;">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Información de tu cuenta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          {{-- Input del documento --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">Documento</label>
          <input readonly type="text" id="documento_user" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          {{-- Input del tipo de documento --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">Tipo De Documento</label>
          <select class="form-control validate" id="tipoDocumento_user" name="select_tipoDocumento">
            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
            <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
            <option value="Cédula de Extranjenría">Cédula de Extranjería</option>
          </select>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          {{-- Input de los nombres --}}
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nombres</label>
          <input type="text" id="nombres_user" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          {{-- Input de los apellidos  --}}
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Apellidos</label>
          <input type="text" id="apellidos_user" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          {{-- Input del correo --}}
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
          <input type="text" id="email_user" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-hospital"></i>
          {{-- Input del tipo de documento --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">EPS</label>
          <select class="form-control validate" id="eps_user" name="select_eps">
            <option value="EPS Sura">EPS Sura</option>
            <option value="Aliansalud">Aliansalud</option>
            <option value="Sanitas">Sanitas</option>
            <option value="Compensar EPS">Compensar EPS</option>
            <option value="Salud Tota">Salud Total</option>
            <option value="Nueva EPS">Nueva EPS</option>
            <option value="Coomeva EPS">Coomeva EPS</option>
            <option value="Famisanar">Famisanar</option>
            <option value="Servicio Occidental de Salud">Servicio Occidental de Salud</option>
            <option value="Comfenalco Valle">Comfenalco Valle</option>
            <option value="Salud Vida">Salud Vida</option>
          </select>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-hospital"></i>
          {{-- Grupo de sangre --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">Tipo de Sangre</label>
          <select class="form-control validate" id="sangre_user" name="select_sangre">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
          </select> 
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-hospital"></i>
          {{-- Input de rh --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">RH</label>
          <select class="form-control validate" id="rh_user" name="select_rh">
            <option value="Positivo">Positivo</option>
            <option value="Negativo">Negativo</option>
          </select> 
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-phone"></i>
          {{-- Input del telefono --}}
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
          <input type="text" id="telefono_user" class="form-control validate">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-secondary" id="updateCuenta">Editar</button>
      </div>
    </div>
  </div>
</div>