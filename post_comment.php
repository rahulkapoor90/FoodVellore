<?php
require('./php/connect_database.php');

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_POST['user_name'];
  $insert=$conn->prepare("insert into reviews values('',':name',':comment',CURRENT_TIMESTAMP)");
  $insert->bindParam(':name',$name);
  $insert->bindParam(':comment',$comment);
  $insert->execute();
  $id = $insert->lastInsertId();

  $select=$conn->prepare("select name,comment,post_time from reviews where name=':name' and comment=':comment' and id=':id'");
  $select->bindParam(':name',$name);
  $select->bindParam(':comment',$comment);
  $select->bindParam(':id',$id);
  $select->execute();
  
  if($row=$select->fetch())
  {
	  $name=$row['name'];
	  $comment=$row['comment'];
      $time=$row['post_time'];
  ?>
      <div class="comment_div"> 
	    <p class="name">Posted By:<?php echo $name;?></p>
        <p class="comment"><?php echo $comment;?></p>	
	    <p class="time"><?php echo $time;?></p>
	  </div>
  <?php
  }
exit;
}

?>