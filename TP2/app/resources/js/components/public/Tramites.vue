<template>
<div class="container">
    <div v-for="tramite in tramites" :key="tramite.id">
        <div>{{ tramite.id }}</div>
        <div>{{ tramite.titulo }}</div>
        <div>{{ tramite.descripcion }}</div>
    </div>
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        mounted() {
            console.log('Se cargaron los tramites.')

            axios.get('/tramites').then((res) => {
                this.$set(this.$data, 'tramites', res.data.tramites)
            })

        },
        data() {
            return {
                tramites:[]
            }
        }
    }
</script>
