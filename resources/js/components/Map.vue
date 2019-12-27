<template>
    <div class="container">
        <div class="card-header">info {{ info }}</div>
    </div>
</template>

<script>
      export default {
        data: function() {
          return {
            info: null
          }
        },
        mounted() {
          axios
            .get('https://api.jcdecaux.com/vls/v1/stations?contract=Nantes&apiKey=d695fb95bd1b81a4415ff3959521a2dc5d57e2f1')
            .then(response => ($this.info = response))
        }
    }
</script>

<style lang="scss" scope>

</style>
