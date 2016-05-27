'use strict';

var appDesign = angular.module('case', ['ngRoute']);

appDesign.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/case', {
    templateUrl: 'case/case.html',
    controller: 'caseCtrl'
  })
  .when('/case/1', {
        templateUrl: 'case/1.html',
        controller: 'caseCtrl'
      })
  .when('/case/2', {
        templateUrl: 'case/2.html',
        controller: 'caseCtrl'
      })
    .when('/case/c1', {
        templateUrl: 'case/c1.html',
        controller: 'caseCtrl'
      })
  .when('/case/c2', {
        templateUrl: 'case/c2.html',
        controller: 'caseCtrl'
      })
}])

.controller('caseCtrl', ['$scope', '$routeParams', function($scope, $routeParams) {

$('.case_img').hover(function(){
    $(".summary",this).stop().animate({top:'0px'},{queue:false,duration:180});
},function(){
    $(".summary",this).stop().animate({top:'120px'},{queue:false,duration:180});
});

}])
;






