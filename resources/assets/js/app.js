
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat', require('./components/Chat.vue'));
Vue.component('composed-chat', require('./components/ComposedChat.vue'));
Vue.component('user-online', require('./components/UserOnline.vue'));


const app = new Vue({
    el: '#app',
    data: {
        chats: [],
        online_users: []
    },
    created(){
        
        const userId =$("meta[name='user_id']").attr('content');
        const friendId =$("meta[name='friend_id']").attr('content');
        
        
        if(friendId != 'null'){
        
            axios.get(`/chat/getChat/${friendId}`)
                .then(response => {
                    this.chats =response.data;
                })
                .catch(err => {
                    console.log(Error(err));
                });
            
            Echo.private('Chat.'+this.friendId+'+'+this.userId)
                .listen('ChatEvent', (e) => {
                    this.chats.push(e.chat);
                });
            
        }
        
        if(userId != 'null'){
            
            Echo.join('Online')
                .here(users => {
                    this.online_users =users;
                })
                .joining(user => {
                    this.online_users.push(user);
                })
                .leaving(user => {
                    this.online_users =this.online_users.filter(u => u != user);
                });
            
        }
        
        
    }
});
