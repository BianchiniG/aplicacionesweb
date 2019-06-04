<template>
    <div class="container">
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar un componente nuevo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="seleccion-componentes">Seleccione el componente que desea agregar:</label>
                                <select class="form-control" name="seleccion-componentes" id="seleccion-componentes">
                                    <option value="texto">Texto</option>
                                    <option value="lista">Lista</option>
                                    <option value="hipervinculo">Links</option>
                                    <option value="adjunto">Adjuntos</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="posicion-componente">¿En que posicion? (Por defecto: Ultimo):</label>
                                <input type="number" class="form-control" name="posicion-componente" id="posicion-componente" min="0" :max="hijos.length" :value="hijos.length"/>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success pull-right" @click="agregarComponente()" data-dismiss="modal">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

        <center><h2>Alta de un Tramite</h2></center>
        <div class="row">
            <div class="col-md-4">
                <button v-if="editable" type="button" id="boton-vista-previa" class="btn btn-info pull-right" style="position: absolute; right: 10px; width: 200px;" @click="vistaPrevia"><i id="icono-boton-vista-previa" class="fa fa-eye"></i> Vista Previa</button>
                <button v-else type="button" id="boton-vista-previa" class="btn btn-warning pull-right" style="position: absolute; right: 10px; width: 200px;" @click="vistaPrevia"><i id="icono-boton-vista-previa" class="fa fa-edit"></i> Editar</button>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="width: 200px;"><i class="fa fa-plus"></i> Agregar Componente</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <input v-if="editable" class="form-control" type="text" :placeholder="placeholders.titulo" v-model="titulo">
                    <h5 v-else class="section-title h1">{{ titulo }}</h5>
                    <input v-if="editable" class="form-control" type="text" :placeholder="placeholders.descripcion" v-model="descripcion">
                    <p v-else>{{ descripcion }}</p>
                    <br>
                    <div v-for="(hijo, indice) in hijos" :key="indice">
                        <component :is="hijo.tipo" :key="hijo.posicion" :tipo="hijo.tipo" :posicion="indice" :editable="editable" :datos="hijo.datos" v-on:borrarme="borrarComponente"></component>
                        <br>
                    </div>
                </div>
                <button class="btn btn-success" @click="guardarTramite"><i class="fa fa-save"></i> ¡Guardar Tramite!</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                editable: true,
                titulo: "",
                descripcion: "",
                hijos: [],
                placeholders: {
                    'titulo': "<El titulo del tramite>",
                    'descripcion': "<La descripcion del tramite>"
                }
            }
        },
        methods: {
            agregarComponente: function () {
                var posicion = $('#posicion-componente').val();
                var nuevo_hijo = {
                        'tipo': $('#seleccion-componentes :selected').val(),
                        'posicion': posicion,
                        'datos': {}
                };
                this.hijos.splice(posicion, 0, nuevo_hijo);
            },
            borrarComponente: function(posicion) {
                this.hijos.splice(posicion, 1);
            },
            vistaPrevia: function() {
                if (this.editable) {
                    this.editable = false;
                } else {
                    this.editable = true;
                }
            },
            guardarTramite: function() {
                var datos = this.obtenerDatosTramite();
                let obj = this;
                axios.post('/admin/nuevo_tramite/crear', {
                    datos: datos
                }).then(function (response) {
                    if (response.status == 200) {
                        location.reload();
                    } else {
                        console.log(response);
                        alert("Ocurrio un error, intentelo nuevamente!");
                    }
                })
            },
            obtenerDatosTramite: function() {
                // Obtengo el componente tramite de vue y creo la estructura basica que se va a devolver.
                var componente_tramite = this.$root.$children[0];
                var tramite = {
                    'titulo': componente_tramite._data.titulo,
                    'descripcion': componente_tramite._data.descripcion,
                    'componentes': []
                }

                // Recorro los hijos, obtengo los datos y los guardo en la estructura que se va a devolver.
                for (var i = 0; i < componente_tramite.$children.length; i++) {
                    var componente_hijo = componente_tramite.$children[i];
                    tramite.componentes.push(componente_hijo.getDatos());
                }

                return tramite;
            }
        }
    }
</script>