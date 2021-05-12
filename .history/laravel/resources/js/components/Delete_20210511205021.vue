<template>
    <div>
        <button @click="onDelete()" type="submit" class="btn btn-danger px-4" style="border-radius: 1.2em">{{ destroy }}</button>
    </div>
</template>

<script>
    export default {
        data: {
            destroy:
        },
        methods: {
            onDelete: function () {
                if(confirm('本当に削除しますか？')) {
                    this.
                }
            }
        }
    }
</script>