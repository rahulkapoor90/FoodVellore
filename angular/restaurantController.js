myApp.controller('restaurantController', ['$scope', '$http', function ($scope, $http) {
    $http.get($scope.something).success(function (data) {
        $scope.items = data;
    }).error(function (data) {
        console.log(data);
        window.location.href="./food.php";
    });
    $scope.orders = [];
    $scope.norder = false;
	  $scope.cstatus = false;
    $scope.disable = false;
    $scope.csuccess = false;
    var reduced_amount = 0;
    var min_bill_amt="";
	   $scope.callOnEnter = function ($event) {
        if ($event.keyCode === 13) {
            $scope.cprocess();
        }
    }

	
    $scope.process = function (item) {
        if (isNaN(item.quantity)) {
            item.quantity = 1;
        } else {
            item.quantity = item.quantity + 1;
        }
        $scope.norder = true;
		$scope.cstatus = true;
        $scope.total = parseInt($scope.total) + parseInt(item.price);
        item.added = true;
        if (item.quantity > 1) {
            for (var i = 0; i < $scope.orders.length; i++) {
                if (($scope.orders[i].itemname) === (item.itemname)) {
                    ($scope.orders).splice(i, 1);
                    break;
                }
            }
        }
		if(item.quantity==1){
			$scope.buy_items = $scope.buy_items + 1;
		}
        var curItem = {};
        curItem.itemname = item.itemname;
        curItem.price = item.quantity * parseInt(item.price);
        curItem.quantity = item.quantity;
        $scope.orders.push(curItem);
        console.log($scope.orders);

    }
    $scope.notSorted = function (obj) {
        if (!obj) {
            return [];
        }
        return Object.keys(obj);
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
					$scope.cstatus = false;
                }
                item.quantity = item.quantity - 1;
                for (var i = 0; i < $scope.orders.length; i++) {
                    if (($scope.orders[i].itemname).match(item.itemname)) {
                        if (item.quantity == 0) {
                            ($scope.orders).splice(i, 1);
							$scope.buy_items = $scope.buy_items - 1;
                        } else if (item.quantity > 0) {
                            $scope.orders[i].quantity = item.quantity;
                        }
                        break;
                    }
                }
            }
        }
    }
	    $scope.cprocess = function () {
        if ($scope.coupon == "" || $scope.coupon == null) {
            alert("enter the coupon code");
        } else {
                $http({
                url: "./coupon_check.php",
                method: 'POST',
                data: {
                    func_status:"apply",
                    coupon: $scope.coupon,
                    rest_name: $scope.rest_name,
                    bill_amount:$scope.total,
                    user : $scope.user
                }
            }).success(function (data, status, headers, config) {
                console.log(data);
               if(data=='zero'){
                $scope.status = 'This coupon has already been applied for this account';
               }else if(data=='one'){
                $scope.status = 'No such coupon exists for this restaurant';
               }else if(data.indexOf("bill")!=-1){
                var ind = data.indexOf("bill");
                min_bill_amt = data.substring(0,ind);
                $scope.status = 'Minimum bill amount for this coupon to be applied should be'+' '+min_bill_amt;
               }else if(!isNaN(data)){
                var discount = data;
                reduced_amount = (parseInt(discount)*$scope.total)/100;
                $scope.total = $scope.total - reduced_amount;
                $scope.status = 'Coupon applied sucessfully';
                $scope.disable = true;
                $scope.csuccess = true;
                $scope.cstatus = false;
               }
            }).error(function (data, status, headers, config) {
                console.log("not done");
            });
        }
    }

    $scope.delete_coupon = function () {
         $http({
                url: "./coupon_check.php",
                method: 'POST',
                data: {
                    func_status:"remove",
                    coupon: $scope.coupon,
                    rest_name: $scope.rest_name,
                    user : $scope.user
                }
            }).success(function (data, status, headers, config) {
               if(data=="deleted"){
                $scope.total = $scope.total + reduced_amount;
                $scope.disable = false;
                $scope.cstatus = true;
                $scope.status = "Coupon Removed";
                $scope.csuccess = false;
               }
            }).error(function (data, status, headers, config) {
                alert("Sorry!!Some error occured.Please try again");
            });
    }
	
    $scope.checkout = function () {
        $http({
            url: "./middleware.php",
            method: 'POST',
            data: {
                total: JSON.stringify($scope.orders),
                amount: $scope.total
            }
        }).success(function (data, status, headers, config) {
            console.log(data);
            window.location.href = './cartdisplay.php';
        }).error(function (data, status, headers, config) {
            console.log("not done");
        });
    }
            }]);
			
	myApp.filter('removeUnderscores', [function() {
return function(string) {
    if (!angular.isString(string)) {
        return string;
    }
    return string.replace(/[/_/]/g, ' ');
 };
}])