<template>
    <div id="note-area">
        <div id="btn-area">
            <div>
                <button id="save-btn" v-on:click="createNote"><i class="fas fa-save"></i></button>
                <button id="view-btn" v-on:click="changeVisible"><i class="fas fa-eye"></i></button>
            </div>
            <div>
                <button id="new-btn" v-on:click="newNote"><i class="fas fa-plus-circle"></i></button>
                <button id="trash-btn" v-on:click="deleteNote"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <div id="note-atea" v-if="isVisible">
            <textarea name="text-content" id="text-content" cols="30" rows="10" :value="getNoteContent" @input="updateNoteText"></textarea>
        </div>
        <vue-markdown :source="getNoteContent"></vue-markdown>
        {{getNoteId}}
    </div>
</template>

<style>
    textarea{
        width:100%;
        border:none;
        color:#666;
        background:whitesmoke;
    }

    #btn-area{
        margin-bottom:30px;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
    }
    
    button#save-btn{
        color:goldenrod;
    }
    button#view-btn{
        color:blue;
    }
    button#trash-btn{
        color:red;
    }
    button#new-btn{
        color:darkolivegreen;
    }

</style>

<script>

import { mapGetters } from "vuex";


export default {
    data(){
        return {
            note : "This is It,",
            isVisible:true,
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
            //this.$store.dispatch("setList")
           
        },
        changeVisible(){
            this.isVisible = !this.isVisible
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