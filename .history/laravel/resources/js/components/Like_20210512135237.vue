<template>
   <div>
       <button type="button" class="btn btn-primary" @click="(postId)">いいね</button>
       <button type="button" class="btn btn-primary" @click="unlike(postId)">いいね{{ likeCount }}</button>
   </div>
</template>
<script>
    export default {
        props: ['postId'],
    }
</script>
