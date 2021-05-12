<template>
    <div>
        <button @click="onDelete()" type="submit" class="btn btn-danger px-4" style="border-radius: 1.2em"></button>
    </div>
</template>

<script>
    export default {
        data: {
            destroy: '削除'
        },
        methods: {
            onDelete: function () {
                if(confirm('本当に削除しますか？')) {
                    this.destroy
                }
            }
        }
    }
</script>