<div class="modal fade " id="modalLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" style="background: #1D3E5C;">
                <h4 class="modal-title w-100 font-weight-bold" style="color: white">Registrarse</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <div class="form-row mb-6">
                        <div class="col">
                            <i class="fas fa-id-card"></i>
                            {{-- Input del documento --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Documento</label>
                            <input type="number" id="documento_userGuardar" class="form-control validate">
                        </div>
                        <div class="col">
                            <i class="fas fa-id-card"></i>
                            {{-- Input del tipo de documento --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Tipo De
                                Documento</label>
                            <select class="form-control validate" id="select_user_tipoDocumentoGuardar"
                                name="select_user_tipoDocumentoGuardar">
                                <option value=""></option>
                                <option value="Cédula de Ciudadanía">Cédula De Ciudadanía</option>
                                <option value="Tarjeta de Identidad">Tarjeta De Identidad</option>
                                <option value="Cédula de Extranjenría">Cédula De Extranjería</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="md-form mb-4">
                    <div class="form-row mb-6">
                        <div class="col">
                            <i class="fas fa-user"></i>
                            {{-- Input de los nombres --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Nombres</label>
                            <input type="text" id="nombres_userGuardar" class="form-control validate">
                        </div>
                        <div class="col">
                            <i class="fas fa-user"></i>
                            {{-- Input de los apellidos  --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Apellidos</label>
                            <input type="text" id="apellidos_userGuardar" class="form-control validate">
                        </div>
                    </div>
                </div>
                <div class="md-form mb-4">
                    <div class="form-row mb-3">
                        <div class="col">
                            {{-- Input del correo --}}
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
                            <input type="email" id="email_userGuardar" class="form-control validate">
                        </div>
                        <div class="col">
                            <i class="fas fa-phone"></i>
                            {{-- Input del telefono --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
                            <input type="number" id="telefono_userGuardar" class="form-control validate">
                        </div>
                    </div>
                </div>
                <div class="md-form mb-4">
                    <div class="form-row mb-3">
                        <div class="col-md-6"> <i class="fas fa-hospital"></i>
                            {{-- Input de eps --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-name">EPS</label>
                            <select class="form-control validate" id="select_user_epsGuardar"
                                name="select_user_epsGuardar">
                                <option value=""></option>
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
                    </div>
                </div>
                <div class="md-form mb-4">
                    <div class="form-row mb-3">
                        <div class="col">
                            <i class="fas fa-hospital"></i>
                            {{-- Input de tipo de sangre --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Tipo De Sangre</label>
                            <select class="form-control validate" id="select_user_sangreGuardar"
                                name="select_user_sangreG">
                                <option value=""></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="col">

                            <i class="fas fa-hospital"></i>
                            {{-- Input de rh --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-name">RH</label>
                            <select class="form-control validate" id="select_user_rhGuardar"
                                name="select_user_rhGuardar">
                                <option value=""></option>
                                <option value="Positivo">Positivo</option>
                                <option value="Negativo">Negativo</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-header text-center" style="background: #1D3E5C;">
                <h4 class="modal-title w-100 font-weight-bold" style="color: white">Contacto</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <div class="form-row mb-6">
                        <div class="col">
                            <i class="fas fa-id-card"></i>
                            {{-- Input del documento --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Documento</label>
                            <input type="number" id="documento_contacto_guardaru" class="form-control validate">
                        </div>
                        <div class="col">
                            <i class="fas fa-user"></i>
                            {{-- Input de los nombres --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Nombres</label>
                            <input type="text" id="nombre_contacto_guardaru" class="form-control validate">
                        </div>
                    </div>
                </div>
                <div class="md-form mb-4">
                    <div class="form-row mb-6">
                        <div class="col">
                            {{-- Input del correo --}}
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
                            <input type="text" id="email_contacto_guardaru" class="form-control validate">
                        </div>
                        <div class="col">
                            <i class="fas fa-phone"></i>
                            {{-- Input del telefono --}}
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
                            <input type="number" id="telefono_contacto_guardaru" class="form-control validate">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-secondary" onclick="crearUsuario()">Guardar</button>
                </div>
            </div>
        </div>
    </div>