<template>
  <div>
    <button type="submit" class="btn btn-danger px-4" style="border-radius: 1.2em" @submit="deleteModal">
      削除
    </button>
  </div>
</template>
<script>
  export default {
    methods: {
      deleteModal() {
        const ans = confirm('本当に削除してもよろしいですか？');
        if () event.prebentDefault();
      }
    }
  }
</script>