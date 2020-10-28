var app = angular.module("lara", ["ngRoute"]);
var csrf = $('meta[name="csrf-token"]').attr('content');

app.run(function($rootScope) {
    $rootScope.title = 'App';
});

app.service('lib', function($http) {
    this.getObject = function(arr, val, key) {
        var zzz = arr.findIndex(function(s) {
            return s[key] == val;
        });
        return arr[zzz];
    }
})

app.config(function($routeProvider) {
  $routeProvider
  .when("/", {
    templateUrl : "page/user.html",
    controller : "user"
  })
  .when("/user", {
    templateUrl : "page/user.html",
    controller : "user"
  })
  .when("/login", {
    templateUrl : "page/login.html",
    controller : "login"
  })
});
