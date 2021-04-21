<script>
  $(function(){
    $(".del_btn").click(function(){
      if(confirm("本当に削除しますか？")){
      // そのまま削除
      }else{
      // キャンセル
      return false;
      }
    });
  });
</script>