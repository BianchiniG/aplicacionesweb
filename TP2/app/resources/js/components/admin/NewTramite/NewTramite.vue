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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success pull-right" @click="nuevo_componente()" data-dismiss="modal">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

        <center><h2>Alta de un Tramite</h2></center>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-info pull-right"><i class="fa fa-eye"></i> Vista Previa</button>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar Componente</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div ref="componentes" class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import Texto from './Texto.vue';
    import Lista from './Lista.vue';
    import Hipervinculo from './Hipervinculo.vue';
    import Adjunto from './Adjunto.vue';

    export default {
        name: 'app',
        components: { Texto, Lista, Hipervinculo, Adjunto },
        methods: {
            nuevo_componente: function() {
                var componente_seleccionado = $("#seleccion-componentes :selected").val();
                var ComponentClass = undefined;

                switch (componente_seleccionado) {
                    case 'texto':
                        ComponentClass = Vue.extend(Texto);
                        break;
                    case 'lista':
                        ComponentClass = Vue.extend(Lista);
                        break;
                    case 'hipervinculo':
                        ComponentClass = Vue.extend(Hipervinculo);
                        break;
                    case 'adjunto':
                        ComponentClass = Vue.extend(Adjunto);
                        break;
                }

                if (ComponentClass) {
                    var instancia = new ComponentClass();
                    instancia.$mount();
                    this.$refs.componentes.appendChild(instancia.$el);
                } else {
                    console.log("No existe el componente "+componente_seleccionado);
                }
            }
        }
    }
</script>