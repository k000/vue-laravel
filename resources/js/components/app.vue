<template>
    <div id="app-area">
        <list-component />
        <note-component />
    
    </div>
</template>


<script>

import { mapGetters } from "vuex";

export default {
    data(){
        return{
            text:"# unko"
        }
    },

    computed:{
        ...mapGetters(['getNoteContent','getNoteId'])
    },
}

</script>