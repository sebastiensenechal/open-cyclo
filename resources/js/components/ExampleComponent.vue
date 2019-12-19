<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">name {{ name }}</div>
                    <input type="text" v-model="name">

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
          return {
          name: 0
          }
        }
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scope>
  .container {
    .card-header{
      background: green;
    }
  }
</style>
