'use strict';

angular.module('intro', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/intro', {
    templateUrl: 'intro/intro.html',
    controller: 'introCtrl'
  });
}])

.controller('introCtrl', ['$scope', function($scope) {
}]);