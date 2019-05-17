<template>
    <div class="container">
        <h6 class="section-title h2">{{ datos.titulo }}</h6>
        <a :href="datos.url"> {{ datos.titulo }} </a>
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
