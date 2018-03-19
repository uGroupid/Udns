rilaApps.controller('WorksBaseCtrl', function($scope, $http) {
    $scope.jobs = [];
    $http.get(urlDataJobWork).success(function(data) {
        $scope.jobs = data;
    });
});