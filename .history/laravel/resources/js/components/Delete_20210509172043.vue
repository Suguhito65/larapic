<template>
   <div>
       <form @click="onSubmit1">
        <button type="submit" class="btn btn-danger px-4" style="border-radius: 1.2em">削除</button>
      </form>
   </div>
</template>
<script>
    export default {
        methods: {
            onSubmit1(event) {
                window.alert('本当に削除しても')
            },
        }
    }
</script>