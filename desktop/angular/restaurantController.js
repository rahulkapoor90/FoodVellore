var myApp = angular.module('myApp',[]);
myApp.controller('restaurantController',['$scope','$http', function($scope, $http){
    $http.get($scope.something).success(function (data){
        $scope.items = data;
    });
    $scope.orders = [];
    $scope.process = function(item){
        if(isNaN(item.quantity)){
            alert("please enter the quantity");
        }
        else{
    	$scope.total = parseInt($scope.total) + item.quantity*parseInt(item.price);
    	item.added=true;
        var cart = '{"name":"'+item.name+'","price":"'+item.quantity*parseInt(item.price)+'","quantity":"'+item.quantity+'"}';
        $scope.orders.push(cart);
        console.log($scope.orders);
    }
    }
    $scope.rprocess = function(item){
    	$scope.total = parseInt($scope.total) - item.quantity*parseInt(item.price);
    	item.added=false;
    }
}]);