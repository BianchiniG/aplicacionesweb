<template>
    <div>
        <div class="form-group">
            <h5 class="section-title h3">Hipervinculo</h5>
            <div class="col-md-8">
                <input id="id_subtitulo_texto" type="text" :placeholder="datos.url" :value="datos.url" class="form-control">
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
