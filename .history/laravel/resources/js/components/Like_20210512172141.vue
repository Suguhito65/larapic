<template>
   <div>
       <button v-if= "" type="button" class="btn btn-primary" @click="submit(postId)">いいね</button>
   </div>
</template>
<script>
    export default {
        props: ['postId', 'userId', 'defaultLiked'],
        data: {
            liked: false
        },
        created: {
            liked = this.defaultLiked
        },
        methods: {
            submit(postId) {
                let url = `/api/posts/${postId}/like`
                axios
                    .post(url, {
                        user_id: this.userId
                    })
                    .then(response => {

                    })
                    .catch(error => {
                        alert(error)
                    });
            }
        }
    }
</script>
