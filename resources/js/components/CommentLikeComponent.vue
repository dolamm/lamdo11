<template>
    <div>
        <p id="success"></p>
        <span>
            <i style="cursor:pointer" @click.prevent="likePost" class="fa fa-thumbs-up" aria-hidden="true"></i>
            <small>({{ totallike }})</small></span>
       </div>
</template>
<script>
    export default {
        props:['comment'],
        data(){
            return {
                totallike:'',
            }
        },
        methods:{
            likePost(){
                axios.post('/commentlike/'+this.comment,{comment:this.comment})
                .then(response =>{
                    this.getlike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getlike(){
                axios.post('/commentlike',{comment:this.comment})
                .then(response =>{
                    console.log(response.data.comment.like)
                    this.totallike = response.data.comment.like
                })
            }
        },
        mounted() {
            this.getlike()
        }
    }
</script> 
