<template>
<div class="container">
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
                                        <button class="btn btn-danger btn-block text-uppercase" v-on:click="borrarTramite(tramite.id)">Borrar</button>
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
            console.log('Se cargaron los tramites.')

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
            borrarTramite: function (id) {
                axios.delete('/admin/tramite/'+id).then((res) => {
                    console.log(res.data.tramites);
                    window.location = '/admin/lista_tramites/';
                })
            }
        }
    }
</script>

