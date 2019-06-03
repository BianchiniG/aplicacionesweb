<template>
    <div v-if="editable" class="row">
        <div class="col-md-1">
            <icon name="circle"></icon>
        </div>
        <div class="col-md-8">
            <input type="file" class="form-control">
        </div>
        <div class="col-md-3">
            <button class="btn btn-danger" @click="borrarme"><icon name="times"></icon> Borrar</button>
        </div>
    </div>
    <div v-else>
        <a :href="path">{{ path }}</a>
    </div>
</template>

<script>
    export default {
        props: ['editable', 'posicion'],
        data: function () {
            return {
                path: "<path del archivo>",
                tipo: "<tipo del archivo>"
            }
        },
        methods: {
            borrarme: function() {
                this.$emit('borrarme', this.posicion);
            }
        }
    }
</script>