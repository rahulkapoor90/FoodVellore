myApp.controller('restaurantController', ['$scope', '$http', function ($scope, $http) {
    $http.get('apna.json').success(function (data) {
        $scope.items = data;
    }).error(function (data) {
        console.log(data);
    });
    $scope.orders = [];
    $scope.norder = false;
    $scope.process = function (item) {
        if (isNaN(item.quantity)) {
            item.quantity = 1;
        } else {
            item.quantity = item.quantity + 1;
        }
        $scope.norder = true;
        $scope.total = parseInt($scope.total) + parseInt(item.price);
        item.added = true;
        if (item.quantity > 1) {
            for (var i = 0; i < $scope.orders.length; i++) {
                if (($scope.orders[i].name).match(item.name)) {
                    ($scope.orders).splice(i, 1);
                    break;
                }
            }
        }
        var curItem = {};
        curItem.name = item.name;
        curItem.price = item.quantity * parseInt(item.price);
        curItem.quantity = item.quantity;
        $scope.orders.push(curItem);

    }
    $scope.rprocess = function (item) {
        if (isNaN(item.quantity) || item.quantity == 0) {
            item.quantity = 0;
        } else {
            if ($scope.total != 0 && item.quantity != 0) {
                $scope.total = parseInt($scope.total) - parseInt(item.price);
                item.added = false;
                if ($scope.total == 0) {
                    $scope.norder = false;
                }
                item.quantity = item.quantity - 1;
                for (var i = 0; i < $scope.orders.length; i++) {
                    if (($scope.orders[i].name).match(item.name)) {
                        if (item.quantity == 0) {
                            ($scope.orders).splice(i, 1);
                        } else if (item.quantity > 0) {
                            $scope.orders[i].quantity = item.quantity;
                        }
                        break;
                    }
                }
            }
        }
    }
    $scope.checkout = function () {
        $http({
            url: "../restaurants/middleware.php",
            method: 'POST',
            data: {
                total: JSON.stringify($scope.orders),
                amount: $scope.total
            }
        }).success(function (data, status, headers, config) {
            console.log(data);
            window.location.href = '../restaurants/checkout.php';
        }).error(function (data, status, headers, config) {
            console.log("not done");
        });
    }
            }]);