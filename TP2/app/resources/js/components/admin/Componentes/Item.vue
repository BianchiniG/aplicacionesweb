<template>
    <div v-if="editable" class="row">
        <div class="col-md-1">
            <icon name="chevron-right"></icon>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" :placeholder="placeholders.contenido" v-model="contenido">
        </div>
        <div class="col-md-6">
            <button class="btn btn-danger" @click="borrarme"><icon name="times"></icon> Borrar</button>
        </div>
    </div>
    <div v-else>
        &nbsp;&nbsp;<li class="fa fa-chevron-right">{{ contenido }}</li>
    </div>
</template>

<script>
    export default {
        props: ['editable', 'posicion', 'datos'],
        mounted() {
            if (this.datos) {
                this.setDatos();
            }
        },
        data: function () {
            return {
                tipo: "item",
                contenido: "",
                placeholders: {
                    'contenido': '<contenido del item>'
                }
            }
        },
        methods: {
            borrarme: function() {
                this.$emit('borrarme', this.posicion);
            },
            setDatos: function () {
                this.contenido = this.datos
            }
        }
    }
</script>