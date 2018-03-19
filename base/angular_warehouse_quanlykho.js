rilaApps.controller('WarehouseQuanlyKhoBaseCtrl', function($scope, $http) {
    $scope.khonvl = [];
    $http.get(urlDataJobWork).success(function(data) {
        $scope.khonvl = data.results;
    });
});