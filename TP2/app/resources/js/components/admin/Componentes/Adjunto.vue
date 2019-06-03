<template>
    <div class="componente" :id="posicion">
        <div class="row">
            <div class="col-md-9">
                <input v-if="editable" class="form-control" type="text" name="titulo" id="titulo" :placeholder="placeholders.titulo" v-model="titulo">
                <h6 v-else class="section-title h2">{{ titulo }}</h6>
                <div v-for="(archivo, index) in archivos" :key="index">
                    <component :is="archivo.tipo" :key="index" :posicion="index" :editable="editable" :datos="archivo.datos" v-on:borrarme="borrarArchivo"></component>
                </div>
                <button v-if="editable" class="btn btn-success" @click="agregarArchivo"><icon name="plus"></icon> Agregar Adjunto</button>
            </div>
            <div class="col-md-3">
                <button v-if="editable" class="btn btn-danger float-right" v-on:click="borrarme()"><icon name="times"></icon></button>
            </div>
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
        props: ['posicion', 'editable'],
        data: function() {
            return {
                indice: 0,
                titulo: '',
                archivos: [],
                placeholders: {
                    'titulo': '<titulo de la seccion de adjuntos>'
                }
            }
        },
        methods: {
            borrarme: function () {
                this.$emit('borrarme', this.posicion);
            },
            agregarArchivo: function() {
                this.archivos.push({
                    'tipo': 'archivo-adjunto'
                });
            },
            borrarArchivo: function(indice) {
                this.archivos.splice(indice, 1);
            }
        }
    }
</script>