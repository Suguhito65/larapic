<template>
   <div>
       <button type="button" class="btn btn-primary" @click="submit(postId)">いいね</button>
   </div>
</template>
<script>
    export default {
        props: ['postId'],
        methods: {
            submit(postId) {
                axios.post('/api/posts/${postId}/like')
                .then(response => {

                })
                .catch(error => {
                    alert(error)
                });
            }
        }
    }
</script>
