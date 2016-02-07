var myApp = angular.module('myApp',[]);
myApp.controller('restaurantController', function($scope, $http){
    $http.get('apna.json').success(function (data){
        $scope.items = data;
    });

    $scope.process = function(name,value){
    	$scope.total = parseInt($scope.total) + parseInt(value);
    }
});