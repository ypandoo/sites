'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
  'ngRoute',
  'catagory',
  'case_list',
  'intro',
  'case',
  'culture',
  'contact',
  'detail'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.otherwise({redirectTo: '/catagory'});
}]);
