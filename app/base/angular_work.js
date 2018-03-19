var urlDataJobWork = site_url + 'cms/loadZoneClients';
uregApps.controller('WorksBaseCtrl', function($scope, $http) {
    $scope.record = [];
    $scope.zone = [];
    $scope.totals = [];
    $(document).ajaxStart(function() {
        Pace.start();
    });
    $http.get(urlDataJobWork).success(function(data) {
        $scope.totals = data.total;
        $scope.zone = data.data_zone;
        $scope.record = data.data_record;
    });
    $(document).ajaxStart(function() {
        Pace.stop();
    });
});