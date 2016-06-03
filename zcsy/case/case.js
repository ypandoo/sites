'use strict';

var appDesign = angular.module('case', ['ngRoute']);

appDesign.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/case', {
    templateUrl: 'case/case.html',
    controller: 'caseCtrl'
  })
}])

.controller('caseCtrl', ['$scope', '$routeParams', function($scope, $routeParams) {

$('.case_img').hover(function(){
    $(".summary",this).stop().animate({top:'0px'},{queue:false,duration:180});
},function(){
    $(".summary",this).stop().animate({top:'120px'},{queue:false,duration:180});
});

}]);
