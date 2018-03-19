jQuery(document).ready(function() {

    jQuery("#Commnetnotes").click(function() {

        var id_jobs = jQuery('#id_jobs').val();
        var content_works = jQuery('#contents_work').val();
        jQuery(".msg").empty();
        jQuery.post(url_global + 'work/addcoment', { notes: content_works, jobs: id_jobs, }, function(resultnote) {
            if (resultnote == 1) {
                jQuery('#contents_work').empty();
                return location.reload(true);
            } else {
                jQuery(".msg").append('vui lòng không bỏ trống các trường (*)');
            }
        });
    });
});

rilaApps.controller('WorksCommentCtrl', function($scope, $http) {
    $scope.note = [];
    $http.get(urlDataNoteJobWork).success(function(data) {
        $scope.note = data.results;

    });
});