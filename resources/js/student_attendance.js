window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.component('student-attendance', require('./components/StudentAttendance.vue').default);

new Vue({
    el: '#student-attendance-section',
    data : {
    },
    methods: {
    }
})
