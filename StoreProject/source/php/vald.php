
<?php  

function is_empty($chec, $text, $loc, $ms, $data){
   if (empty($chec)) {
   	 $em = "The ".$text." is empty you need to fill it";
   	 header("Location: $loc?$ms=$em&$data");
   	 exit;
   }
   return 0;
}