myApp.controller('offersController', ['$scope', '$http', function ($scope, $http) {
   $http.get("./json/offers.json").success(function (data) {
        $scope.items = data;
    }).error(function (data) {
        console.log(data);
    });

}]);