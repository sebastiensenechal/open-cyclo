/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('leaflet', require('./components/leaflet.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


new Vue({
        el: '#root',
        data: {},
        mounted() {
          this.$nextTick(() => {
          	this.$refs.map.$gmapApiPromiseLazy().then(this.loadControls);
          });
        },
        methods: {
        	loadControls(map) {
            var controlDiv = document.createElement('div')
            var firstChild = document.createElement('button')
            firstChild.style.backgroundColor = 'red'
            firstChild.title = 'Your Location'
            controlDiv.appendChild(firstChild)
            var secondChild = document.createElement('div')
            secondChild.style.margin = '5px'
            secondChild.style.width = '50px'
            secondChild.style.height = '50px'
            secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)'
            secondChild.style.backgroundSize = '180px 18px'
            secondChild.style.backgroundPosition = '0px 0px'
            secondChild.style.backgroundRepeat = 'no-repeat'
            secondChild.id = 'you_location_img'
            firstChild.appendChild(secondChild)
            window.google.maps.event.addListener(this.$refs.map.$mapObject, 'center_changed', function () {
              secondChild.style['background-position'] = '0 0'
            })
            var ref = this
            firstChild.addEventListener('click', function () {
              navigator.geolocation.getCurrentPosition(position => {
                let latlng = new window.google.maps.LatLng(
                  parseFloat(position.coords.latitude),
                  parseFloat(position.coords.longitude))
                ref.center = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                }
                ref.createMarker(latlng)
              })
            })
            controlDiv.index = 1
            this.$refs.map.$mapObject.controls[window.google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv)
          }
        }
      });
