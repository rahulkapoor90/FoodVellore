myApp.controller('foodController', ['$scope', '$http', function ($scope, $http) {
	$scope.loading = true;

    $http.get('./json/restaurants.json').success(function (data) {
        $scope.items = data;
		$scope.loading = false;
    }).error(function (data) {
        console.log(data);
    });
$scope.check_time = function(item){
var minutes  = parseInt(new Date().getMinutes())+10;
var now_time= (new Date().getHours()).toString() + minutes.toString();
if(parseInt(now_time)>parseInt(item.opening_time) && parseInt(now_time)<parseInt(item.closing_time)){
return true;
}
else{
return false;
}
}
}]);