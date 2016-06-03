'use strict';

angular.module('case_list', ['ngRoute'])
.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/list/:type', {
    templateUrl: 'case/list.html',
    controller: 'listCtrl'
  })}
])
.controller('listCtrl', ['$scope', '$routeParams', function($scope, $routeParams) {

     var url = base_url+'Content/get_list';
     var type_trans = ['默认','建筑工程','物资贸易', '建筑劳务分包', '农林牧渔', '餐饮文化', '广告传媒'];
     var submit_data ={list_type:type_trans[$routeParams.type], page_start:0};

     if (typeof $routeParams.type == 'undefined' || !$routeParams.type) {
       return;
     }

     base_remote_data.ajaxjson(
                       url, //url
                       function(data){
                         if(data.hasOwnProperty('success')){
                               if(data.success == 1 ){
                                   $scope.cases = data.data;
                                   $scope.$apply();

                               }
                               else{
                                  alert('返回错误!');
                               }
                           }
                         else {
                           alert('返回值错误!');
                         }
                     },
                     submit_data,
                     function()
                     {
                       alert('网络错误!');
                     });

}]);
