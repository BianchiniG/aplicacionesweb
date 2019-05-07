<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">desde el public</div>

                    <div class="card-body">
                        <p>Yo soy un tramite</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Se cargo el tramite.')
        }
    }
</script>
