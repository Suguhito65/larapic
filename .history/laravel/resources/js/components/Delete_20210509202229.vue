<template>
  <div>
    <button type="submit" class="btn btn-danger px-4" style="border-radius: 1.2em" @click="deleteModal">
      削除
    </button>
  </div>
</template>
<script>
  export default {
    data: function () {
      
    },
    methods: {
      deleteModal() {
        if (confirm('本当に削除してもよろしいですか？')) {
          return true;
        } else {
          return false;
        }
      }
    }
  }
</script>