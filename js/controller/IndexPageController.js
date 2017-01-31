/*jslint browser: true*/
/*global console, MyApp*/

MyApp.angular.controller('IndexPageController', ['$scope', '$http', 'InitService', 'DataService', function ($scope, $http, InitService, DataService) {
  'use strict';
    
  $scope.onItemClicked = function(app){
      DataService.appClicked(app);
  };
  
      $scope.onGroupClicked = function(group){
	  console.log(group);
      DataService.groupClicked(group);
  };
    
        $scope.openlink = function (a) {
			console.log(a);
			
        window.open( a , '_self');
		
    };	
	
  InitService.addEventListener('ready', function () {
    // DOM ready
    console.log('IndexPageController: ok, DOM ready');
    DataService.getApps().then(function(result) {
        console.log(result);
        $scope.apps = result.data.files;
        $scope.client = result.data.client;
        $scope.groups = result.data.groups;
        $scope.groupsApps = result.data.files;
		window.setTimeout(function () { loading_screen.finish(); }, 500);
		
        //console.log(result.data['1927']);
    },function(err) {
        console.error(err);
    }); 
  });
}
]);