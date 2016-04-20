myApp.controller('facultyController', ['$scope', '$http', function ($scope, $http) {
    $http.get('getfac.php').success(function (data) {
        $scope.items = data;
    }).error(function (data) {
        console.log(data);
    });
}]);