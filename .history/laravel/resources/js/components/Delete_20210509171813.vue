<template>
   <div>
       <form @submit="onSubmit1">
        <button type="submit">ボタン1 送信されます</button>
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