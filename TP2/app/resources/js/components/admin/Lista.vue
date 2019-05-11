<template>
<div class="container">
    <h5 class="section-title h3">Subtitulo</h5>
    <div class="col-md-8">
        <input id="id_titulo_lista" type="text" :placeholder="datos.titulo" class="form-control">
    </div>
    <h5 class="section-title h3">Descripcion</h5>
    <div class="col-md-8">
        <input id="id_titulo_lista" type="text" :placeholder="datos.descripcion" class="form-control">
    </div>
    <h5 class="section-title h3">Items</h5>
    <div v-for="item in datos.items" :key="item.id">
        <ul>
            <li><input type="text" :placeholder="item.contenido" class="form-control">
                <button type="button" class="btn btn-danger">Borrar</button>
            </li>
        </ul>
    </div>
<button class="btn btn-primary btn-block text-uppercase">Guardar</button>
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
