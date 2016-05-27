'use strict';

angular.module('catagory', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/catagory', {
    templateUrl: 'Catagory/catagory.html',
    controller: 'catagoryCtrl'
  });
}])

.controller('catagoryCtrl', [function() {

}]);