<template>
    <div>
        <button id="save-btn" v-on:click="listVisible = !listVisible"><i class="fas fa-align-justify"></i></button>
        <div id="app-area">

         
            <list-component v-if="listVisible" />    
       

            <div id="note-area" v-bind:class="{active:!listVisible}">
                <note-component />
            </div>

        </div>
    </div>
</template>


<script>

import { mapGetters } from "vuex";

export default {
    data(){
        return{
            text:"",
            listVisible:true,
        }
    },

    computed:{
        ...mapGetters(['getNoteContent','getNoteId'])
    },

    methods:{
        responsive(){
            this.listVisible = !this.listVisible
        }
    }
}

</script>