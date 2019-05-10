<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">desde el public</div>

                    <div class="card-body">
                        <p>Yo soy el tramite {{ datostramite.id }}</p>
                        <p>Mis componentes son: </p>
                        <div class="row" v-for="componente in datostramite.componentes" :key="componente.id">
                            {{ componente.id }}:
                            {{ componente }}
                            <hola :datos="componente"></hola>
                        </div>
                    </div>
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
