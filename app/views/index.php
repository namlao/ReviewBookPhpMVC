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
        foreach($book as $item){
            echo $item['name'].'<br>';
        }
    
    ?>

</div>


<!-- footer -->
<?php $this->footer('scripts')?>