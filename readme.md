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

エラーが出た

'''

ERROR in ./node_modules/vue-markdown/dist/vue-markdown.common.js
Module not found: Error: Can't resolve 'babel-runtime/core-js/get-iterator' in '/home/vagrant/code/mynote/node_modules/vue-markdown/dist'
 @ ./node_modules/vue-markdown/dist/vue-markdown.common.js 9:27-72
 @ ./resources/js/store.js
 @ ./resources/js/app.js
 @ multi ./resources/js/app.js ./resources/sass/app.scss

ERROR in ./node_modules/vue-markdown/dist/vue-markdown.common.js
Module not found: Error: Can't resolve 'babel-runtime/core-js/object/keys' in '/home/vagrant/code/mynote/node_modules/vue-markdown/dist'
 @ ./node_modules/vue-markdown/dist/vue-markdown.common.js 9:74-118
 @ ./resources/js/store.js
 @ ./resources/js/app.js
 @ multi ./resources/js/app.js ./resources/sass/app.scss
npm ERR! code ELIFECYCLE
npm ERR! errno 2
npm ERR! @ development: `NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js`
npm ERR! Exit status 2
npm ERR! 
npm ERR! Failed at the @ development script.
npm ERR! This is probably not a problem with npm. There is likely additional logging output above.

npm ERR! A complete log of this run can be found in:
npm ERR!     /home/vagrant/.npm/_logs/2019-11-09T06_47_01_894Z-debug.log
npm ERR! code ELIFECYCLE
npm ERR! errno 2
npm ERR! @ dev: `npm run development`
npm ERR! Exit status 2
npm ERR! 
npm ERR! Failed at the @ dev script.
npm ERR! This is probably not a problem with npm. There is likely additional logging output above.

npm ERR! A complete log of this run can be found in:
npm ERR!     /home/vagrant/.npm/_logs/2019-11-09T06_47_01_934Z-debug.log

'''

対応方法

cd node_modules
cd vue-markdown

yarn


npm run dev でエラー消滅
