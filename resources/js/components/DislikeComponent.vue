<template>
    <div class="container">
        <p id="success"></p>
       <span><i style = "cursor:pointer" @click.prevent="disLikePost" class="fa fa-thumbs-down" aria-hidden="true"></i><small>{{ totalDislike }}</small></span>
    </div>
</template>
<script>
    export default {
        props:['post'],
        data(){
            return {
                totalDislike:'',
            }
        },
        methods:{
            disLikePost(){
                axios.post('/dislike/'+this.post,{post:this.post})
                .then(response =>{
                    this.getDislike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getDislike(){
                axios.post('/dislike',{post:this.post})
                .then(response =>{
                    console.log(response.data.post.dislike)
                    this.totalDislike = response.data.post.dislike
                })
            }
        },
        mounted() {
            this.getDislike()
        }
    }
</script> 
