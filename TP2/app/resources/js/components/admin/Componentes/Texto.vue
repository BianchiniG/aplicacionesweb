<template>
    <div class="componente" :id="posicion">
        <div class="row" v-if="editable">
            <div class="col-md-9">
                <input class="form-control" type="text" id="titulo" :placeholder="placeholders.titulo" v-model="titulo">
                <input class="form-control" type="text" id="contenido" :placeholder="placeholders.contenido" v-model="contenido">
            </div>
            <div class="col-md-3">
                <button class="btn btn-danger float-right" v-on:click="borrarme()"><icon name="times"></icon></button>
            </div>
        </div>
        <div v-else>
            <h6 class="section-title h2">{{ titulo }}</h6>
            <p>{{ contenido }}</p>
        </div>
    </div>
</template>

<style>
.tabla {
    width: 100%;
}
</style>

<script>
    export default {
        props: ['editable', 'posicion', 'tipo'],
        data: function() {
            return {
                titulo: '',
                contenido: '',
                placeholders: {
                    'titulo': '<titulo>',
                    'contenido': '<contenido del componente texto>'
                }
            }
        },
        methods: {
            borrarme: function () {
                this.$emit('borrarme', this.posicion);
            },
            getDatos: function () {
                return {
                    'tipo': this.tipo,
                    'posicion': this.posicion,
                    'titulo': this.titulo,
                    'contenido': this.contenido
                };
            } 
        }
    }
</script>