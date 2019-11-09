# Laravel Vue


## パッケージのインストール

composer require laravel/ui --dev

## スカフォールドのインストール

php artisan ui vue

Please run "npm install && npm run dev" to compile your fresh scaffolding.

## npm install

npm install

npm run dev

これで
resources/js/components/ExampleComponent.vue
ができる


## コンポーネントの使用

app.jsで登録しておきます

'''
Vue.component('example-component', require('./components/app.vue').default);
Vue.component('list-component', require('./components/List.vue').default);
Vue.component('note-component', require('./components/Note.vue').default);
Vue.component('app-component', require('./components/app.vue').default);
'''

あとは使用するvueファイルで使用できる

<template>
    <div>
        <list-component />
    </div>
</template>


## Vuexのインストール

npm install --save-dev vuex


## axios deleteの時

'''
    async deleteNote(context,param){
        console.log(param)
        await axios.delete('/note/delete',{data:param})
        .then((res) => {
            context.dispatch("setList")
            context.commit('setCreateNoteId',"")
        })
        .catch((e) =>{
            console.log(e)
        })
    },
'''


dataキーにパラメータを入れないとダメ

参考
https://qiita.com/yfujii1127/items/991ae9ff29b478a55b1c


## axios getの時

'''
    async setTextContent(context,id){
        let params = {
            id:parseInt(id)
        }
        await axios.get('/note/',{params})
        .then( (res) => {
            context.commit('setTextContent',res.data[0])
        })
        .catch( (e) => {
            console.log(e)
        })
    },
'''

？？？
要調査



## vue-markdown

https://github.com/miaolz123/vue-markdown?ref=kabanoki.net

npm install --save vue-markdown



