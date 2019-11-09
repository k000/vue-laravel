<template>
    <div id="note-area">

        <vue-markdown :source="getNoteContent"></vue-markdown>

        <div>
            <button id="save-btn" v-on:click="createNote"><i class="fas fa-save"></i></button>
            <button id="view-btn" v-on:click="getNotes"><i class="fas fa-eye"></i></button>
            
            <button id="new-btn" v-on:click="newNote"><i class="fas fa-plus-circle"></i></button>
            <button id="trash-btn" v-on:click="deleteNote"><i class="fas fa-trash"></i></button>
            
        </div>
        <textarea name="text-content" id="text-content" cols="30" rows="10" :value="getNoteContent" @input="updateNoteText"></textarea>
        {{getNoteContent}}
        {{getNoteId}}
    </div>
</template>

<style>
    textarea{
        width:100%;
        border:none;
        color:#666;
    }
    button#save-btn{
        color:greenyellow;
    }
    button#view-btn{
        color:blue;
    }
    button#trash-btn{
        color:red;
    }

</style>

<script>

import { mapGetters } from "vuex";


export default {
    data(){
        return {
            note : "This is It,",
        }
    },



    computed:{
        ...mapGetters(['getNoteContent','getNoteId'])
    },

    methods:{
        createNote(){
            const textContet = document.getElementById('text-content').value

            if (this.getNoteId) {
                //update
                const params = {
                    content : textContet,
                    id : this.getNoteId,
                }
                this.$store.dispatch("updateNote",params)
            } else {
                //create
                const params = {
                    content : textContet,
                    id : this.getNoteId,
                }
                this.$store.dispatch("createNote",params)
            }

        },
        getNotes(){
            this.$store.dispatch("setList")
        },
        deleteNote(){
            
            if (this.getNoteId) {
                const params = {
                    id: this.getNoteId
                }
                this.$store.dispatch("deleteNote",params)
            } else {
                alert("you dont choice note")
            }
        },
        newNote(){
            this.$store.dispatch("newNote")
        },

        updateNoteText(e){
            this.$store.dispatch("updateTextContent",e.target.value)
        }

    },

}
</script>