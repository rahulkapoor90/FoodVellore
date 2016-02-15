myApp.controller('restaurantController',['$scope','$http', function($scope, $http){
    $http.get($scope.something).success(function (data){
        $scope.items = data;
    });
    $scope.orders = [];
    $scope.norder=false;
    $scope.process = function(item){
        $scope.norder = true;
        if(isNaN(item.quantity)){
            alert("please enter the quantity");
        }
        else{
    	$scope.total = parseInt($scope.total) + item.quantity*parseInt(item.price);
    	item.added=true;
        var curItem  = {};
        curItem.name = item.name;
        curItem.price = item.quantity*parseInt(item.price);
        curItem.quantity = item.quantity;
        $scope.orders.push(curItem);
    }
    }
    $scope.rprocess = function(item){
    	$scope.total = parseInt($scope.total) - item.quantity*parseInt(item.price);
    	item.added=false;
        for(var i=0;i<$scope.orders.length;i++){
            if(($scope.orders[i].name).match(item.name)){
                ($scope.orders).splice(i,1);
            }
        }
    }
    $scope.checkout = function(){
         $http({
         url:"../restaurants/checkout.php",
         method : 'POST',
         data :{
            'total':$scope.total
        }
    }).success(function(data, status, headers, config) {
        window.location.href = '../restaurants/checkout.php'
    }).error(function(data, status, headers, config) {
       console.log("not done");
});
    }
}]);