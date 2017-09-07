// Define the `ProjectListController` controller on the `projectApp` module
angular.module('projectApp').component('projectList', {
    template:
    '<ul>' +
    '<li ng-repeat="project in $ctrl.projects">' +
    '<span>{{ project.name }}</span>' +
    '<p>' +
    '{{ project.description }}' +
    '</p>' +
    '</li>' +
    '</ul>' +
    '<p>Total number of projects : {{ $ctrl.projects.length }}</p>',
    controller: function ProjectListController($http) {
        var self = this;
        var baseUrl = window.location.protocol + '//' + window.location.host + '/portfolio/web/app_dev.php';
        $http.get(baseUrl + '/testajax').then(function (response) {
            self.projects = response.data;
        });
    }
});