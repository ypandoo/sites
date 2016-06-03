'use strict';

angular.module('detail', ['ngRoute'])
.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/detail/:id', {
    templateUrl: 'case/detail.html',
    controller: 'detailCtrl'
  })}
])
.filter('trustHtml', function ($sce) {
        return function (input) {
            return $sce.trustAsHtml(input);
        }
})
.controller('detailCtrl', ['$scope', '$routeParams', function($scope, $routeParams) {

     var url = base_url+'Content/get_content_detail';
     var submit_data = {'content_id':$routeParams.id};

     if (typeof $routeParams.id == 'undefined' || !$routeParams.id) {
       return;
     }

     base_remote_data.ajaxjson(
                       url, //url
                       function(data){
                         if(data.hasOwnProperty('success')){
                               if(data.success == 1 ){
                                   $scope.TITLE =  data.data[0].CONTENT_TITLE;
                                   $scope.HTML =  data.data[0].CONTENT_HTML;
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
