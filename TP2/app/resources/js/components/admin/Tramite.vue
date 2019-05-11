<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <h5 class="section-title h1">Modificar Tramite</h5>
                            <div class="form-group">
                                <h5 class="section-title h3">Icono</h5>
                                <div class="col-md-8">
                                    <input id="id_icono_tramite" type="text" :placeholder="datostramite.icono" :value="datostramite.icono" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="section-title h3">Titulo</h5>
                                <div class="col-md-8">
                                    <input id="id_titulo_tramite" type="text" :placeholder="datostramite.titulo" :value="datostramite.titulo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5 class="section-title h3">Descripcion</h5>
                                <div class="col-md-8">
                                    <input id="id_descripcion_tramite" type="text" :placeholder="datostramite.descripcion" :value="datostramite.descripcion" class="form-control">
                                </div>
                            </div>
                            <div v-for="componente in datostramite.componentes" :key="componente.id">
                                <div v-if="componente.nombre == 'texto'">
                                    <texto :datos="componente"></texto>
                                </div>
                                <div v-else-if="componente.nombre == 'lista'">

                                    <lista :datos="componente"></lista>
                                </div>
                                <div v-else>
                                    <p>No Existe el componente :(</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <button style="width: 300px;" class="btn btn-success btn-block text-uppercase">Guardar</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['datostramite'],
        mounted() {
            console.log(this.datostramite)
        }
    }
</script>
