<template>
    <div>
        <button class="btn btn-primary btn-sm">いいね済</button>
        <button class="btn btn-primary btn-sm">いいね</button>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        mounted () {
            console.log(this.post);
        }
    }
</script>