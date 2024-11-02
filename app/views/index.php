<!-- header -->
<?php $this->header(
    [
        "title"=>"Trang chủ",
        "style"=>"style"
    ]);
 ?>


<!-- content -->
<div>
    <?php 
        echo $book; 
    
    ?>

</div>


<!-- footer -->
<?php $this->footer('scripts')?>