'use strict';

// define angular module/app
angular.module('myAppAdmin', ['ngFileUpload'])
.controller('formController',['$scope', '$http', 'Upload', '$timeout', function($scope, $http, Upload, $timeout) {

// create a blank object to hold our form information
// $scope will allow this to pass between controller and view
$scope.formData = {};
$scope.formData.type = 'h5game';
$scope.formData.priority = '0';
$scope.formData.newfile = '';
$scope.formData.newfile1 = '';
$scope.formData.newfile2 = '';
$scope.formData.newfile3 = '';


// process the form
$scope.processForm = function() {
  
  $http({
  method  : 'POST',
  url     : 'process.php',
  data    : $scope.formData,  // pass in data as strings
  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
 })
 .success(function(data) {
    console.log(data);

    if (!data.success) {
      // if not successful, bind errors to error variables
      $scope.errorName = data.errors.name;
      $scope.errorDescription = data.errors.description;
      $scope.errorAttachto = data.errors.attachto;
      $scope.errorLink = data.errors.link;
    } else {
      // if successful, bind success message to message
      alert('上传成功！');
      $scope.message = data.message;
      $scope.errorName = '';
      $scope.errorDescription = '';
      $scope.errorAttachto = '';
      $scope.errorLink = '';
      $scope.formData = {};
    $scope.formData.type = 'h5game';
    $scope.formData.priority = '0';
    $scope.file1 = '';
    $scope.file2 = '';
    $scope.file3 = '';
    $scope.file = '';
    }
  });
};

  //Upload images
  $scope.uploadPic = function(file) {
    if (file == undefined || null == file) {return;};
    Upload.upload({
      url: 'process_image.php',
      data: {file: file},
    }).then(function (response) {
      $timeout(function () {
        console.log(response);
        //file.result = response.data;
        $scope.formData.newfile =  response.data.file_name;
        $scope.message = response.data.message;
      });
    }, function (response) {
        console.log(response);
      if (response.status > 0)
        //$scope.errorMsg = response.status + ': ' + response.data;
         $scope.errorFile = response.data.errors.file;
    }, function (evt) {
      // Math.min is to fix IE which reports 200% sometimes
      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
    });

    }

    $scope.uploadPic1 = function(file1) {
    if (file1 == undefined || null == file1) {return;};
    Upload.upload({
      url: 'process_image.php',
      data: {file: file1},
    }).then(function (response) {
      $timeout(function () {
        console.log(response);
        //file.result = response.data;
        $scope.formData.newfile1 =  response.data.file_name;
        $scope.message = response.data.message;
      });
    }, function (response) {
        console.log(response);
      if (response.status > 0)
        //$scope.errorMsg = response.status + ': ' + response.data;
         $scope.errorFile = response.data.errors.file;
    }, function (evt) {
      // Math.min is to fix IE which reports 200% sometimes
      file1.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
    });

    }

    $scope.uploadPic2 = function(file2) {
      if (file2 == undefined || null == file2) {return;};
    Upload.upload({
      url: 'process_image.php',
      data: {file: file2},
    }).then(function (response) {
      $timeout(function () {
        console.log(response);
        //file.result = response.data;
        $scope.formData.newfile2 =  response.data.file_name;
        $scope.message = response.data.message;
      });
    }, function (response) {
        console.log(response);
      if (response.status > 0)
        //$scope.errorMsg = response.status + ': ' + response.data;
         $scope.errorFile = response.data.errors.file;
    }, function (evt) {
      // Math.min is to fix IE which reports 200% sometimes
      file2.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
    });

    }

    $scope.uploadPic3 = function(file3) {
      if (file3 == undefined || null == file3) {return;};
    Upload.upload({
      url: 'process_image.php',
      data: {file: file3},
    }).then(function (response) {
      $timeout(function () {
        console.log(response);
        //file.result = response.data;
        $scope.formData.newfile3 =  response.data.file_name;
        $scope.message = response.data.message;
      });
    }, function (response) {
        console.log(response);
      if (response.status > 0)
        //$scope.errorMsg = response.status + ': ' + response.data;
         $scope.errorFile = response.data.errors.file;
    }, function (evt) {
      // Math.min is to fix IE which reports 200% sometimes
      file3.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
    });

    }

}]);



