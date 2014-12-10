var cmsApp = angular.module("cmsApp", ['ngRoute']);

cmsApp.factory('employees', ['$http', function($http){
  return {
    get: function(callback){
      $http.get('get-data.php').success(function(data){
        callback(data);
      });
    }
  };
}]);

cmsApp.config(function ($routeProvider){
  $routeProvider
    .when('/', {templateUrl:'cms-view/home.php'})
    .when('/medarbejdere', {templateUrl: 'cms-view/brugeroversigt.php'})
    .when('/skriv-nyhed', {templateUrl: 'cms-view/skriv-nyhed.php'})
    .when('/quizvindere', {templateUrl: 'cms-view/quizvindere.php'})
    .when('/stand-up-historier', {templateUrl: 'cms-view/stand-up.php'})

    .otherwise({redirectTo: '/', templateUrl:'cms-views/home.php'});
});

cmsApp.controller('userCtrl', function($scope, employees){
  employees.get(function(response){
    $scope.employees = response;
  });
  
});