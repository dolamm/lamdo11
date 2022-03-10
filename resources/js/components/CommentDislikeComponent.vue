<template>
    <div>
        <p id="success"></p>
       <span><i style = "cursor:pointer" @click.prevent="disLikePost" class="fa fa-thumbs-down" aria-hidden="true"></i><small>({{totalDislike}})</small></span>
    </div>
</template>
<script>
    export default {
        props:['comment'],
        data(){
            return {
                totalDislike:'',
            }
        },
        methods:{
            disLikePost(){
                axios.post('/commentdislike/'+this.comment,{comment:this.comment})
                .then(response =>{
                    this.getDislike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getDislike(){
                axios.post('/commentdislike',{comment:this.comment})
                .then(response =>{
                    console.log(response.data.comment.dislike)
                    this.totalDislike = response.data.comment.dislike
                })
            }
        },
        mounted() {
            this.getDislike()
        }
    }
</script> 
