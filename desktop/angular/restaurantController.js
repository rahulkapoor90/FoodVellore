var myApp = angular.module('myApp',[]);
myApp.controller('restaurantController',['$scope','$http', function($scope, $http){
    $http.get('apna.json').success(function (data){
        $scope.items = data;
    });
   
    $scope.process = function(item){
    	$scope.total = parseInt($scope.total) + item.quantity*parseInt(item.price);
    	item.added=true;
    }
    $scope.rprocess = function(item){
    	$scope.total = parseInt($scope.total) - item.quantity*parseInt(item.price);
    	item.added=false;
    }
}]);