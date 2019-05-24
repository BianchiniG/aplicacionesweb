<template>
    <div class="container">
        <h5 class="section-title h1">{{ datostramite.titulo }}</h5>
        <p>{{ datostramite.descripcion }}</p>
        <div v-for="componente in datostramite.componentes" :key="componente.id">
            <div v-if="componente.nombre == 'texto'">
                <texto :datos="componente"></texto>
            </div>
            <div v-else-if="componente.nombre == 'lista'">
                <lista :datos="componente"></lista>
            </div>
            <div v-else-if="componente.nombre == 'hipervinculo'">
                <hipervinculo :datos="componente"></hipervinculo>
            </div>
            <div v-else-if="componente.nombre == 'adjunto'">
                <adjunto :datos="componente"></adjunto>
            </div>
            <div v-else>
                <p>No Existe el componente :(</p>
            </div>
        </div >
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
