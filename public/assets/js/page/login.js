app.controller("login", function($scope, $http) {
    $scope.msg = "login";
    $scope.input = {};

    $scope.senddata = function() {
        $http({
            method: 'POST',
            url: '/auth/login',
            data: $scope.input
        }).then(function success(response) {
            console.log(response)
        }, function error(response) {
            console.log("false")
        });
    }

});
