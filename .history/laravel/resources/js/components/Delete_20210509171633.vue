<template>
   <div>
       <form @submit="onSubmit1" action="/" method="POST">
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
            onSubmit2(event) {
                window.alert('onSubmit2')
                event.preventDefault()
            }
        }
    }
</script>