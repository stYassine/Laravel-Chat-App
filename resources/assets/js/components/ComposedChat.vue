<template>
    <div>
        
        <div class="form-group">
            <input type="text" class="form-control" v-model="chat">
        </div>
        
        <div class="form-group">
            <button class="btn btn-info" v-on:click="send">Send</button>
        </div>
        
    </div>
</template>


<script>
    export default {
        data(){
            return {
                chat: ''
            }
        },
        props: ['chats', 'user_id', 'friend_id'],
        methods: {
            
            send(){
                
                let data ={};
                
                axios.post('/chat/sendChat', data)
                    .then(response => {
                        this.chats.push(data);
                        this.chat ='';
                    })
                    .catch(err => {
                        console.log(Error(err));
                    });
                
            }
            
        }
    }
</script>


<style>
</style>