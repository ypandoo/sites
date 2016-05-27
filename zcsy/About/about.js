'use strict';

angular.module('myApp.about', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/about', {
    templateUrl: 'About/about.html',
    controller: 'aboutCtrl'
  });
}])

.controller('aboutCtrl', [function() {

}]);