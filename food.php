<?php 

require('./connect.php');
require('./header.php');
$_SESSION['back'] = 1;
if(isset($_SESSION['order'])){
unset($_SESSION['order']);
unset($_SESSION['bill']);
unset($_SESSION['customer_bill']);
unset($_SESSION['cashback']);
unset($_SESSION['order_no']);
}
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="FoodOnz,Food,Restaurants,Online order" />
<meta name="description" content="Foodonz is an online ordering platform through which people can order food and get their food delivered or dine at the respective restaurant."/>
<meta name="author" content="FoodOnz" />
<link rel="stylesheet" type="text/css" href="./stylesheets/food_style.css">
<style>
.mySpinner{
	position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  margin: auto; /* presto! */
  }
@media only screen and (min-width: 320px) {
   .whole-rest{
padding-left: 0px !important;
padding-right: 0px !important;
}
#search-box{
width:100% !important;
margin-left: 4% !important;
}
.flex-big{
padding:20px !important;
}

}
</style>
		<script type="text/javascript">
		$(document).ready(function(){
      $('body').append('<div id="toTop" class="btn btn-info"><span class="glyphicon glyphicon-chevron-up"></span> Back to Top</div>');
    	$(window).scroll(function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		}); 
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>
<script type="text/javascript">
function post()
{
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  if(comment && name)
  {
    $.ajax
    ({
      type: 'POST',
      url: 'post_comment.php',
      data: 
      {
         user_comm:comment,
	     user_name:name
      },
      success: function (response) 
      {
	    document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
	    document.getElementById("comment").value="";
        document.getElementById("username").value="";
  
      }
    });
  }
  
  return false;
}
</script>
<script src="./angular/foodController.js"></script>

<div id="product-list" ng-app="myApp">
<div class="container whole-rest" class="ng-cloak" ng-controller="foodController">
<div id='search-box'>

<input id='search-text search-form' ng-model="search.menu_json" name='q' placeholder='Search restaurants' autocomplete="off" type='text'/>
</div>
 <div class="row">
<div class="col-lg-2"></div>
<div class="col-sm-12 col-lg-8" id="carousel">

                    </div>
                    <div class="col-lg-2"></div>

                </div>
                <div class="flex-container">
                    <div class="flex-big">
                        <div class="row">
<?php
if (!isset($_SESSION["user_login"])) {
     $meu = "data-toggle='modal' data-target='#login-modal'";
}
else
{
   $meu = "href='./menu.php?rest_name={{item.menu_json}}&name={{item.name}}'";
}
?>
<div class="panel-group col-sm-6 col-md-6 col-xs-12 col-lg-4 hint--top ng-cloak" data-hint="Click for Menu" ng-repeat="(key,val) in items">
<a itemprop="menu" class="rest-link" <?php echo $meu; ?>>
  <div id="close" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Sorry we are closed now..Please come back tomorrow</p>
      </div>
    </div>

  </div>
</div>
  <div class="panel panel-default rest-panel" ng-repeat="item in val | filter:search">
    <div class="panel-body">
	<div class="row title-rest">
	<p style="text-align:center;color:black;font-weight:bold;margin-top:9px; font-size:18px;">{{item.name}}</p>
	<p style="text-align:center;color:black;font-weight:bold;margin-top:9px; font-size:18px;" ng-hide=true ng-model="menu_json">{{item.menu_json}}</p>
	</div>
	 <div class="row">
	 <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">

<img style="border-radius: 178px; display: block;" src="{{item.thumbnail}}">
</div>
 <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
 <div class="row">
 <div class="col-sm-12 restdesc-text">
 <i class="fa fa-cutlery fa-fw fa-lg"></i> <small class="rest-desc1">{{item.type}}</small>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-12">
 <span class="food-name"><i class="fa fa-map-marker fa-fw fa-lg"></i>{{item.address1}}</span>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-12">
 <span class="timing"><i class="fa fa-clock-o fa-fw fa-lg"></i> <small>{{item.time}} </small></span>
 </div>
 </div>
 </div>
</div>
<div class="row tag-rest">
<div class="col-sm-12 col-md-12 col-lg-12">
<h1><center><p><i class="em em-{{item.emoji}}"></i> {{item.tagline}}</p></center></h1>
</div>
</div>
</div>
<div class="panel-footer">
<div ng-if="check_time(item)" style="color:#006400; font-size:16px; font-weight:bold !important;">
<p><center><i class="em em-thumbsup"></i> Open now</center></p>
</div>
<div ng-if="!check_time(item)" style="color:#FF0000; font-size:16px; font-weight:bold !important;">
<p style="color:orange;"><center><i class="em em-thumbsdown"></i> Closed now</center></p>
</div>
</div>
</a>
</div>

<div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="gallery-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="signup-modal-label">Gallery</h2>
                    </div>
                    <div class="modal-body">
					<div class="row">
                        <div class='list-group gallery'>
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="fancybox thumbnail" rel="ligthbox" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448185/foodonz/dishes/red_sauce_pasta.jpg">
                    <img class="img-responsive" alt="" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448185/foodonz/dishes/red_sauce_pasta.jpg" />
                </a>
            </div> <!-- col-6 / end -->
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="fancybox thumbnail" rel="ligthbox" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448178/foodonz/dishes/panner_naan.jpg">
                    <img class="img-responsive" alt="" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448178/foodonz/dishes/panner_naan.jpg" />
                </a>
            </div> <!-- col-6 / end -->
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="fancybox thumbnail" rel="ligthbox" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448175/foodonz/dishes/mughlai_paratha.jpg">
                    <img class="img-responsive" alt="" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448175/foodonz/dishes/mughlai_paratha.jpg" />
                </a>
            </div> <!-- col-6 / end -->
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="fancybox thumbnail" rel="ligthbox" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448133/foodonz/dishes/d2.jpg">
                    <img class="img-responsive" alt="" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448133/foodonz/dishes/d2.jpg" />
                </a>
            </div> <!-- col-6 / end -->
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="fancybox thumbnail" rel="ligthbox" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448157/foodonz/dishes/d11.jpg">
                    <img class="img-responsive" alt="" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448157/foodonz/dishes/d11.jpg" />
                </a>
            </div> <!-- col-6 / end -->
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="fancybox thumbnail" rel="ligthbox" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448146/foodonz/dishes/d9.jpg">
                    <img class="img-responsive" alt="" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1455448146/foodonz/dishes/d9.jpg" />
                </a>
            </div> <!-- col-6 / end -->
            
        </div> <!-- list-group / end -->
		</div>
                    </div>

                </div>
            </div>
        </div>

<div class="modal fade" id="review-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="signup-modal-label">Reviews</h2>
                    </div>
                    <div class="modal-body">
                       <form method='post' action="" onsubmit="return post();">
  <textarea id="comment" placeholder="Write Your Comment Here....."></textarea>
    <br>
	<input type="text" id="username" placeholder="Your Name">
  <input type="submit" value="Post Comment">
  </form>
  <div id="all_comments">
  <?php
    $comm = $conn->prepare("SELECT name,comment,post_time FROM reviews order by post_time desc");
	$comm->execute();
    while($row=$comm->fetch())
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
    ?>
  </div>

                    </div>

                </div>
            </div>
        </div>
</div>
<div class="row">


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('./footer.php') ?>