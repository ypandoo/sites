'use strict';

angular.module('culture', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/culture', {
    templateUrl: 'culture/culture.html',
    controller: 'introCtrl'
  });
}])

.controller('cultureCtrl', ['$scope', function($scope) {
}]);