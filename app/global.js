var uregApps = angular.module('uregApps',[]);
var infocompany = site_url+'layout/angularjs/company_info';
uregApps.controller("appHeader", function($scope, $http){
$scope.resller = [];
$http.get(infocompany).success(function(data) {
$scope.resller = data['company'];});});
