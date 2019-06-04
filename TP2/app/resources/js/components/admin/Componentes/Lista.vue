<template>
    <div class="componente" :id="posicion">
        <div class="row">
            <div class="col-md-9">
                <input v-if="editable" class="form-control" type="text" name="titulo" id="titulo" :placeholder="placeholders.titulo" v-model="titulo">
                <h6 v-else class="section-title h2">{{ titulo }}</h6>
                <input v-if="editable" class="form-control" type="text" name="descripcion" id="descripcion" :placeholder="placeholders.descripcion" v-model="descripcion">
                <p v-else>{{ descripcion }}</p>
                <div v-for="(item, index) in items" :key="index">
                    <component :is="item.tipo" :key="index" :posicion="index" :editable="editable" :datos="item.datos" v-on:borrarme="borrarItem"></component>
                </div>
                <button v-if="editable" class="btn btn-success" @click="agregarItem"><icon name="plus"></icon> Agregar Item</button>
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
        props: ['posicion', 'editable', 'tipo'],
        data: function() {
            return {
                titulo: '',
                descripcion: '',
                items: [],
                placeholders: {
                    'titulo': '<titulo>',
                    'descripcion': '<descripcion del componente lista>'
                }
            }
        },
        methods: {
            borrarme: function () {
                this.$emit('borrarme', this.posicion);
            },
            agregarItem: function() {
                this.items.push({
                    'tipo': 'item'
                });
            },
            borrarItem: function(indice) {
                this.items.splice(indice, 1);
            },
            getItems: function () {
                var items = [];
                var cuenta = 1;
                for (var i = 0; i < this.$children.length; i++) {
                    var hijo = this.$children[i];
                    if (hijo.tipo == "item") {
                        items.push({
                            'indice': cuenta++,
                            'contenido': hijo.contenido
                        })
                    }
                }
                return items;
            },
            getDatos: function () {
                return {
                    'tipo': this.tipo,
                    'posicion': this.posicion,
                    'titulo': this.titulo,
                    'descripcion': this.descripcion,
                    'items': this.getItems()
                }
            }
        }
    }
</script>