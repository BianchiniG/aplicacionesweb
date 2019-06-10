<template>
    <div class="container">
        <h6 class="section-title h2">{{ datos.titulo }}</h6>
        <button class="btn btn-success" @click="download(datos.id_tramite, datos.nombre_archivo)"> Download </button>
    </div>
</template>

<script>
    export default {
        props: ['datos'],
        methods: {
            download: function(id_tramite, nombre_archivo) {
                window.location = '/download/'+id_tramite+'/'+nombre_archivo;
            }
        }
    }
</script>
