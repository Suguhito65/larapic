<template>
  <div>
    <button type="submit" class="btn btn-danger px-4" style="border-radius: 1.2em" @click="onModal">削除</button>
  </div>
</template>
<script>
  export default {
    methods: {
      Modal() {
        if(confirm('本当に削除してもよろしいですか？')) {

        } else {
          return faise;
        }
      }
    }
  }
</script>