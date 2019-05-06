<form method="post" v-on:submit.prevent="createUsuario">
    <div class="modal" id="create">
            <div class="modal-content">
                <h4>Crear nuevo usuario</h4>
                <div class="row">
                    <div class="col s12">
                        <div class="col s6">
                            <label for="dato">Nombre</label>
                            <input type="text" name="name" class="form-control" v-model="newUsuario.name">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.name }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Apellido</label>
                            <input type="text" name="apellido" class="form-control" v-model="newUsuario.apellido">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.apellido }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Nombre de usuario</label>
                            <input type="text" name="username" class="form-control" v-model="newUsuario.username">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.username }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Password</label>
                            <input type="password" name="password" class="form-control" v-model="newUsuario.password">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.password }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Cuit</label>
                            <input type="text" name="cuit" class="form-control" v-model="newUsuario.cuit">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.cuit }}</span>
                        </div>
                        <div class="col s6">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" v-model="newUsuario.email">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.email }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Telefono</label>
                            <input type="text" name="telefono" class="form-control" v-model="newUsuario.telefono">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.telefono }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Codigo postal</label>
                            <input type="text" name="postal" class="form-control" v-model="newUsuario.postal">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.postal }}</span>
                        </div>
                        <div class="col s6">
                            <label for="nivel">Estado del usuario</label>
                            {!! Form::select('activo', ['1' => 'Activo', '0' => 'Inactivo'], 1, ['class' => 'form-control', 'v-model' => 'newUsuario.activo', 'placeholder' => 'Seleccione estado']) !!}
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.activo }}</span>
                        </div>
                        <div class="col s6">
                            <label for="nivel">Tipo de usuario</label>
                            {!! Form::select('nivel', ['particular' => 'Particular', 'ortopedia' => 'Ortopedia', 'obra_social' => 'Obra social'], null, ['class' => 'form-control', 'v-model' => 'newUsuario.nivel', 'placeholder' => 'Seleccione tipo de usuario']) !!}
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.nivel }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Razón social</label>
                            <input type="text" name="social" class="form-control" v-model="newUsuario.social">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.social }}</span>
                        </div>
                        <div class="col s6">
                            <label for="dato">Dirección</label>
                            <input type="text" name="direccion" class="form-control" v-model="newUsuario.direccion">
                            <span v-for="error in errors" data-error="wrong"
                                class="helper-text red-text">@{{ error.direccion }}</span>
                        </div>
                    </div>
                </div>
                {{-- <span v-for="error in errors" class="text-danger">@{{ error.dato }}</span> --}}
                <div class="modal-footer">
                    <input type="submit" value="Guardar" class="boton btn">
                </div>
            </div>
        </div>
</form>