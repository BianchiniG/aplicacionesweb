<template>
    <div class="container">
        <p>Hola, yo soy el componente hola</p>
        {{ datos }}
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
