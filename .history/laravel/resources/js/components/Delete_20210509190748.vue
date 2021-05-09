<template>
  <div>
    <button type="submit" class="btn" @click="deleteModal">削除</button>
  </div>
</template>
<script>
  export default {
    methods: {
      deleteModal() {
        if(confirm('本当に削除してもよろしいですか？')) {
        } else {
        }
      }
    }
  }
</script>