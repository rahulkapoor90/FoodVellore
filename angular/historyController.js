myApp.controller('historyController', ['$scope', '$http', function ($scope, $http) {
    var l=0;
    $http.get('get_order_history.php').success(function (data) {
        $scope.items = data;
        
        l = $scope.items.length;
        if (l == 0)
            alert("No more orders yet");
        for (var i = 0; i < l; i++) {
            $scope.items[i].orders = angular.fromJson($scope.items[i].orders);
        }
    }).error(function (data) {
        console.log(data);
    });
    var count = -1;
    $scope.getValue = function (item) {
        count = count + 1;
        return item[count].orders;
    }
    $scope.check = function(user){
        var d = new Date().getDate();
        var m = new Date().getMonth();
        var y = new Date().getFullYear();
        var tt = new Date().getHours();
        var tm = new Date().getMinutes();
        var t = (user.order_time).split(/[- :]/);
        var f = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);4
        var dd = f.getDate();
        var mm= f.getMonth();
        var yy= f.getFullYear();
        var ot = (user.time).split(":");
        if(dd==d && mm==m && yy==y){
            if(ot[0]>tt){
                return true;
            }
            if(tt==ot[0]){
            if(tm>ot[1]){
                    return false;
                    }
                else{
            return true;
        }
    }
        }
       return false;

    }
    $scope.delete_order = function(user){
        console.log(user.order_no);
        var answer = confirm("Are you sure you want to cancel the order");
        if(answer){
        $http({
            url: "./delete_order_history.php",
            method: 'POST',
            data: {
                order_no:user.order_no,
                username:$scope.user,
                rest_name:user.rest_name
            }
        }).success(function (data, status, headers, config) {
            console.log(data);
            window.location.href = './orderhistory.php';
        }).error(function (data, status, headers, config) {
            console.log("not done");
        });
    }
}
}]);