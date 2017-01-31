/*jslint browser: true*/
/*global console, MyApp*/

MyApp.angular.controller('DetailPageController', ['$scope', '$http','$window', 'InitService', 'DataService', function ($scope, $http, $window, InitService, DataService) {
  'use strict';

	$scope.redirectToGoogle = function (a,b) {
		console.log(a);
		console.log(b);
        $window.open('//uaepro.me/ipa/down.php?id1=' + b + '&id2=' + a , '_self');
    };
  
    DataService.addEventListener('appClicked',function(app){
        $scope.app = app;
        
    });
    
}]);