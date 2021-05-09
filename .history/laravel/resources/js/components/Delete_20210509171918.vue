<template>
   <div>
       <form @click="onSubmit1">
        <button type="submit">削除</button>
      </form>
   </div>
</template>
<script>
    export default {
        methods: {
            onSubmit1(event) {
                window.alert('onSubmit1')
            },
        }
    }
</script>