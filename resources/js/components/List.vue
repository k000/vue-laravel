<template>
    <div id="list-area">
        <input type="text" placeholder="Serach" v-model="serach"><button @click="searchNote"><i class="fas fa-search"></i></button>
        <div id="list-box">
            <ul class="note-list" v-for="item in list" v-bind:key="item.id">
                <li @click="setTextContent(item.id)" >{{item.id}}{{item.content.substring(0,30)}}</li>
            </ul>
        </div>
    </div>
</template>

<style>
    
    ul.note-list{
        list-style: none;
        margin:0;
        padding:0 5px;
    }
    ul.note-list li{
        border-bottom:1px dotted #333;
        padding:10px 0;
        cursor: pointer;
    }
    ul.note-list li:hover{
        background:ivory;
    }

    #list-box{
        width:100%;
        height:70vh;
        overflow: scroll;
    }

</style>


<script>

import { mapState } from "vuex";

export default {
    data(){
        return{
            serach:""
        }
    },
    computed:{
        ...mapState({
            list: state => state.list
        })
    },
    methods: {
        setList(){
            this.$store.dispatch("setList")
        },
        setTextContent(id){
            this.$store.dispatch("setTextContent",id)
        },
        searchNote(){
            this.$store.dispatch("searchNote",this.serach)
        },
    },
    created(){
        this.setList()
    }
}
</script>