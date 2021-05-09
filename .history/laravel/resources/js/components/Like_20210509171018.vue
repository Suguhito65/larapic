<template>
   <div>
       <button v-if="!liked" type="button" class="btn btn-primary" @click="like(postId)">いいね{{ likeCount }}</button>
       <button v-else type="button" class="btn btn-primary" @click="unlike(postId)">いいね{{ likeCount }}</button>
   </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>