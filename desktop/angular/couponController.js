myApp.controller('couponController',['$scope','$http',function($scope,$http){
	$scope.cstatus = true;
	$scope.disable = false;
	$scope.cprocess = function(){
		if($scope.coupon=="" || $scope.coupon==null){
			alert("enter the coupon code");
		}
		else{
		$http({
         url:"../restaurants/coupon_check.php",
         method : 'POST',
         data :{
            coupon : $scope.coupon,
            rest_name : $scope.rest_name
        }
    }).success(function(data, status, headers, config) {
        if(data!="no"){
        	var discount = parseInt(data);
        	var reduced = ($scope.total*discount)/100;
        	$scope.total = $scope.total-reduced;
        	$scope.cstatus = false;
        	$scope.status = "Coupon Applied Sucessfully";
        	$scope.disable = true;
        }
        else{
        	$scope.status = "No such coupon exists.Plese try a different one";
        }
    }).error(function(data, status, headers, config) {
       console.log("not done");
});
	}
}
  $scope.payment = function(){
  	alert("Payment Integration needed");
  }
}]);