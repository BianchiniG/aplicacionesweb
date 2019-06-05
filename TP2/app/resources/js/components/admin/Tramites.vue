<template>
<div class="container">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Borrar Tramite (<small id="modal-titulo-tramite"></small>)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="text" id="modal-id-tramite" hidden>
                    <p>¿Estas seguro de que queres borrar el tramite?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger pull-right" @click="borrarTramite()" data-dismiss="modal">Borrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4" v-for="tramite in tramites" :key="tramite.id">
            <div class="col-xs-12">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="card-title">{{ tramite.titulo }}</h4>
                                    <p class="card-text">{{ tramite.descripcion }}</p>
                                    <h3 class="fa fa-4x" :class="tramite.icono"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">{{ tramite.titulo }}</h4>
                                    <p class="card-text">{{ tramite.descripcion }}</p>
                                    <button class="btn btn-primary btn-block text-uppercase" v-on:click="editarTramite(tramite.id)">Editar</button>
                                    <!-- <button class="btn btn-danger btn-block text-uppercase" type="button" data-toggle="modal" data-target="#myModal">Borrar</button> -->
                                    <button class="btn btn-danger btn-block text-uppercase" type="button" @click="preguntarSiDeseaBorrar(tramite.id, tramite.titulo)">Borrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        mounted() {
            axios.get('/admin/tramites').then((res) => {
                this.$set(this.$data, 'tramites', res.data.tramites)
            })
        },
        data() {
            return {
                tramites:[]
            }
        },
        methods: {
            editarTramite: function (id) {
                window.location = '/admin/editar_tramite/'+id;
            },
            preguntarSiDeseaBorrar: function(id, titulo) {
                $('#modal-id-tramite').text(id);
                $('#modal-titulo-tramite').text(titulo);
                $('#myModal').modal('toggle');
            },
            borrarTramite: function () {
                var id = $('#modal-id-tramite').text();
                axios.delete('/admin/tramite/'+id).then((res) => {
                    window.location = '/admin/lista_tramites/';
                })
            }
        }
    }
</script>

