myApp.controller('adminController', ['$scope', '$http', function ($scope, $http) {
    var l = 0;
    $http.get('get_orders.php').success(function (data) {
        $scope.items = data;
        console.log(data);
        var obk = angular.fromJson($scope.items[0].orders);
        console.log(obk);
    }).error(function (data) {
        console.log(data);
    });
            }]);