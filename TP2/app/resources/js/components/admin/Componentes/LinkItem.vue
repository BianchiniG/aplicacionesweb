<template>
    <div v-if="editable" class="row">
        <div class="col-md-1">
            <icon name="circle"></icon>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" :placeholder="placeholders.url" v-model="url">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" :placeholder="placeholders.descripcion" v-model="descripcion">
        </div>
        <div class="col-md-3">
            <button class="btn btn-danger" @click="borrarme"><icon name="times"></icon> Borrar</button>
        </div>
    </div>
    <div v-else>
        &nbsp;&nbsp;&nbsp; <a target="_blank" :href="url">{{ descripcion }}</a>
    </div>
</template>

<script>
    export default {
        props: ['datos', 'editable', 'posicion'],
        mounted() {
            console.log(this.datos);
            if (this.datos) {
                this.setDatos();
            }
        },
        data: function () {
            return {
                tipo: "link-item",
                url: "",
                descripcion: "",
                placeholders: {
                    'url': "<contenido del item>",
                    'descripcion': "<descripcion de la url>"
                }
            }
        },
        methods: {
            borrarme: function() {
                this.$emit('borrarme', this.posicion);
            },
            setDatos: function () {
                this.url = this.datos.url,
                this.descripcion = this.datos.descripcion
            }
        }
    }
</script>