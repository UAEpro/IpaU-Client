/*jslint browser: true*/
/*global console, MyApp*/

MyApp.angular.controller('GroupsPageController', ['$scope', '$http','$window', 'InitService', 'DataService', function ($scope, $http, $window, InitService, DataService) {
  'use strict';

	$scope.redirectToGoogle = function (a,b) {
		console.log(a);
		console.log(b);
        $window.open('http://uaepro.me/ipa/down.php?id1=' + b + '&id2=' + a , '_self');
    };
  
    DataService.addEventListener('groupClicked',function(group){
		console.log(group);
        $scope.group = group;
        
    });
    
}]);