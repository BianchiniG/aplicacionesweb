<template>
    <div class="container">
        <h6 class="section-title h2">{{ datos.titulo }}</h6>
        <div v-for="link in datos.links" :key="link.id">
            <ul>
                <li class="fas fa-chevron-right"><a :href="link.url"> {{ link.descripcion }} </a></li>
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
