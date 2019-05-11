<template>
    <div class="container">
        <h6 class="section-title h2">{{ datos.titulo }}</h6>
        <p>{{ datos.descripcion }}</p>
        <div v-for="item in datos.items" :key="item.id">
            <ul>
                <li class="fas fa-chevron-right">{{ item.contenido }}</li>
            </ul>
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
