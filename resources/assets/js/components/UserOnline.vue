<template>
    <div class="pull-right">
        
        <span>
            <i class="fa fa-circle green" v-if="checkUser()"></i>
            <i class="fa fa-circle red" v-else></i>
        </span>
        
    </div>
</template>


<script>
    export default {
        data(){
            return {}
        },
        props: ['friend', 'online_users'],
        methods: {
            
            checkUser(){
                return _.find(this.online_users, { id: this.friend.id })
            }
            
        }
    }
</script>


<style>
    .green{
        color: green;
    }
    .red{
        color: red;
    }
</style>