<template>
  <div>
    <form @click="onModal">
      <button class=" btn btn-danger px-4" style="border-radius: 1.2em">削除</button>
    </form>
  </div>
</template>
<script>
    export default {
        methods: {
            onModal(e) {
                window.alert('本当に削除してもよろしいですか？')
            },
        }
    }
</script>