<template>
   <div>
       <button v-if="!liked" type="button" class="btn btn-primary" @click="like(postId)">いいね{{ likeCount }}</button>
       <button v-else type="button" class="btn btn-primary" @click="unlike(postId)">いいね{{ likeCount }}</button>
   </div>
</template>
<script>
    export default {
        methods: {
            onSubmit1(event) {
                window.alert('onSubmit1')
            },
            onSubmit2(event) {
                window.alert('onSubmit2')
                event.preventDefault()
        }
    }
</script>