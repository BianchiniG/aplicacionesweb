<template>
    <div>
        <div class="row">
            <div class="col-md-3">Titulo</div>
            <div class="col-md-9">
                <div v-if="datos">
                    <input id="titulo_lista" type="text" :placeholder="datos.titulo" :value="datos.titulo" class="form-control">
                </div>
                <div v-else>
                    <input id="titulo_lista" type="text" placeholder="" value="" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">Descripcion</div>
            <div class="col-md-9">
                <div v-if="datos">
                    <input id="descripcion_lista" type="text" :placeholder="datos.descripcion" :value="datos.descripcion" class="form-control">
                </div>
                <div v-else>
                    <input id="descripcion_lista" type="text" placeholder="" value="" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                Items
            </div>
            <div class="col-md-9">
                <button type="button" class="btn btn-success" @click="agregarItem()"><i class="fa fa-plus"></i> Nuevo Item</button>
            </div>
        </div>
        <br>
        <div class="row">
            <ul>
                <div v-if="datos">
                    <div class="row" v-for="item in datos.items" :key="item.id">
                        <div class="col-md-9">
                            <li><input type="text" :placeholder="item.contenido" :value="item.contenido" class="form-control"></li>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-danger">Borrar</button>
                        </div>
                        <br>
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
