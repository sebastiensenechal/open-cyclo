<template>
  <gmap-map
    :ref="map"
    :center="center"
    :zoom="7"
    style="width: 100vw; height: 100vh"

  >
    <gmap-marker
      :key="index"
      v-for="(m, index) in markers"
      :position="m.position"
      :clickable="true"
      :draggable="true"
      @click="center=m.position"
    ></gmap-marker>

  </gmap-map>
</template>

<script>
  import * as VueGoogleMaps from 'vue2-google-maps';
  import Vue from 'vue';

  Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyBk23x91Y7W33DfrFMQytqEbRMQEdxuDa4'
    },
  });
</script>
