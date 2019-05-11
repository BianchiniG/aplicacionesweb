<template>
    <div class="container">
        <div class="form-group">
            <h5 class="section-title h3">Subtitulo</h5>
            <div class="col-md-8">
                <input id="id_subtitulo_texto" type="text" :placeholder="datos.titulo" class="form-control">
            </div>
            <h5 class="section-title h3">Descripcion</h5>
            <div class="col-md-8">
                <input id="id_descripcion_texto" type="text" :placeholder="tramite.descripcion" class="form-control">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['datos'],
        mounted() {
            console.log(this.datos)
        }
    }
</script>
