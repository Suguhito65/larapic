<template>
   <div>
       <button v-if= "!liked" type="button" class="btn btn-primary" @click="like(postId)">like</button>
        <button v-elsetype="button" class="btn btn-primary" @click="unlike(postId)">liked</button>
   </div>
</template>
<script>
    export default {
        props: ['postId', 'userId', 'defaultLiked'],
        data() {
            return {
                liked: false,
                likeCount: 0,
            };
        },
        created () {
            this.liked = this.defaultLiked
            this.likeCount = this.defaultCount
        },
        methods: {
            like(postId) {
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
            },
            unlike(postId) {
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
