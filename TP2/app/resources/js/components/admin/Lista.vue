<template>
    <div>
        <div class="form-group">
            <h5 class="section-title h3">Subtitulo</h5>
            <div class="col-md-8">
                <input id="id_titulo_lista" type="text" :placeholder="datos.titulo" :value="datos.titulo" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <h5 class="section-title h3">Descripcion</h5>
            <div class="col-md-8">
                <input id="id_titulo_lista" type="text" :placeholder="datos.descripcion" :value="datos.descripcion" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <h5 class="section-title h3">Items</h5>
            <ul>
                <div class="row" v-for="item in datos.items" :key="item.id">
                    <div class="col-md 4">
                        <li><input type="text" :placeholder="item.contenido" :value="item.contenido" class="form-control"></li>
                    </div>
                    <div class="col-md 2">
                        <button type="button" class="btn btn-danger">Borrar</button>
                    </div>
                </div>
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
