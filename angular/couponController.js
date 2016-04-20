myApp.controller('couponController', ['$scope', '$http', '$location','$rootScope',function ($scope, $http,$location,$rootScope) {
	$http.get('getOrders.php?demand=orders').success(function (data){
		$scope.items = data;
	}).error(function (data){
		console.log(data);
	});
  $http.get('getOrders.php?demand=user_details').success(function (data){
    $scope.user_details = data;
    $scope.address_line1 = $scope.user_details[0].address_line1;
    $scope.name = $scope.user_details[0].name;
    $scope.address_line2 = $scope.user_details[0].address_line2;
  }).error(function (data){
    console.log(data);
  });
  $scope.date_show=false;
  $scope.city="Vellore";
  $scope.state = "Tamil Nadu";
  $scope.disable = true;
  $scope.callOnEnter  = function($event,utype){
    if($event.keyCode===13){
      $scope.radioEvent(utype);
    }
  }
  $scope.radioEvent = function(utype){
    if(utype=="pickup"){
      $scope.text = "At what time would you like to pickup";
      $scope.date_show=true;
    }
    else if(utype=="dine"){
      $scope.text = "At what time would you dine";
      $scope.date_show=true;
    }
    if(utype=="delivery"){
      $scope.text = "At what time would you like to take the delivery";
      $scope.date_show=true;
    }
  }
   $('#datetimepicker').datetimepicker({
                    format: 'LT',
                    useCurrent:true,
                    ignoreReadonly:true
                    
                });
}]);