<template>
 <form @submit.prevent="submitComment">
     

     <textarea class="border rounded p-3" name="" id="" cols="30" rows="10" v-model="title"></textarea>
    
     <button type="submit"> envoi</button>
 </form>

</template>

<script>

import Vuecal from 'vue-cal';
import 'vue-cal/dist/vuecal.css';
// import { Kalendar } from 'kalendar-vue';
// window.Kalendar = require('kalendar-vue');
// import 'kalendar-vue/dist/kalendar-vue.css';
    export default {
        components: { Vuecal },
        data(){
            return {
                title:'',
                text:'',
            
            }
        },


        methods: {
            submitComment(){
                axios.post('/calendar/admin/calendar',{
                    title: this.title
                })
                console.log(this.title);
            }
        }
    }
</script>
