var rilaApps = angular.module('rilaApps', []);
rilaApps.controller("appHeader", function($scope, $http) {
    $scope.ifc = [];
    $http.get(url_global + 'public/dist/js/data/info_apps.json').success(function(data) {
        $scope.ifc = data.company;
    });
});
var AppsAcountServiceResponse = url_global + 'account/AppsAcountServiceResponse';
var AppsAccountServiceTotal = url_global + 'account/AppsAccountServiceTotal';