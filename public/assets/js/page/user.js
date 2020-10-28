app.controller("user", function($scope, $http) {
    $scope.msg = "okee";
    $scope.listdata = [];

    $scope.getdata = function() {
      $http({
          method: 'GET',
          url: '/getuser',
          data: {}
      }).then(function success(response) {
          $scope.listdata = response.data
      }, function error(response) {
          console.log("false")
      });
    }

});
