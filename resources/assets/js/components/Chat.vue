<template>
    <div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <p>Messages</p>
            </div>
            <div class="panel-body">
                
                <div v-if="chats.length > 0">
                    
                    <div v-for="chat in chats" class="clearfix">
                        
                        <div v-if="chat.user_id == user_id">
                            {{ chat.chat }}
                        </div>
                        
                        <div v-else class="pull-right">
                            {{ chat.chat }}
                        </div>
                        
                    </div>
                    
                </div>
                
                <div v-else>
                    <p>No Messages</p>
                </div>
                
            </div>
            <div class="panel-footer">
                <composed-chat
                    v-bind:chats="chats"
                    v-bind:user_id="user_id"
                    v-bind:friend_id="friend_id"
                ></composed-chat>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        data(){
            return {}
        },
        props: ['chats', 'user_id', 'friend_id'],
        created(){
            
            
            
        }
    }
</script>


<style>
</style>