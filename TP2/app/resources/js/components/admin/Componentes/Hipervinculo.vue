<template>
    <div class="componente" :id="posicion">
        <div class="row">
            <div class="col-md-9">
                <input v-if="editable" class="form-control" type="text" name="titulo" id="titulo" :placeholder="placeholders.titulo" v-model="titulo">
                <h6 v-else class="section-title h2">{{ titulo }}</h6>
                <div v-for="(url, index) in urls" :key="index">
                    <component :is="url.tipo" :key="index" :posicion="index" :editable="editable" :datos="url.datos" v-on:borrarme="borrarUrl"></component>
                </div>
                <button v-if="editable" class="btn btn-success" @click="agregarUrl"><icon name="plus"></icon> Agregar Url</button>
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
        props: ['datos', 'posicion', 'editable', 'tipo'],
        mounted() {
            if (this.datos) {
                this.setDatos();
            }
        },
        data: function() {
            return {
                titulo: '',
                urls: [],
                placeholders: {
                    'titulo': '<titulo de la seccion de links>'
                }
            }
        },
        methods: {
            borrarme: function () {
                this.$emit('borrarme', this.posicion);
            },
            agregarUrl: function() {
                this.urls.push({
                    'tipo': 'url'
                });
            },
            borrarUrl: function(indice) {
                this.urls.splice(indice, 1);
            },
            getLinks: function () {
                var items = [];
                var cuenta = 1;
                for (var i = 0; i < this.$children.length; i++) {
                    var hijo = this.$children[i];
                    if (hijo.tipo == "url") {
                        items.push({
                            'indice': cuenta++,
                            'url': hijo.url,
                            'descripcion': hijo.descripcion
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
                    'links': this.getLinks()
                }
            },
            setDatos: function () {
                this.titulo = this.datos.titulo;
                var cantidad = this.datos.links.length;
                for (var i = 0; i < cantidad; i++) {
                    var link_item = this.datos.links[i];
                    this.urls.push({
                        'tipo': 'link-item',
                        'indice': i,
                        'datos': link_item
                    })
                }
            }
        }
    }
</script>