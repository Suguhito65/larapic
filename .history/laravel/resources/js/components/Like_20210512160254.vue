<template>
   <div>
       <button type="button" class="btn btn-primary" @click="submit(postId)">いいね</button>
   </div>
</template>
<script>
    export default {
        props: ['postId', 'userId'],
        methods: {
            submit(postId) {
                let url = `/api/posts/${postId}/like`
                axios
                    .post(url, )
                    .then(response => {

                    })
                    .catch(error => {
                        alert(error)
                    });
            }
        }
    }
</script>
