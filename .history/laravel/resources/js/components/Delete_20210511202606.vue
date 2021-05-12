<template>
    <div>
        <button @click="" type="submit" class="btn btn-danger px-4" style="border-radius: 1.2em">削除</button>
    </div>
</template>

<script>
    export default {
        data: {
        },
        methods: {
            ondelete: function () {
                if(confirm('本当に削除しますか？'))
            }
        }
    }
</script>