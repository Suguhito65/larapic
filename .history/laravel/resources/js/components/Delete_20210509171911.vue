<template>
   <div>
       <form @click="onSubmit1">
        <button type="submit">sali</button>
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