/**
 * Created by Shivam Mathur on 04-08-2015.
 */
app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            redirectTo: '/premium'
        })
        .when('/premium', {
            templateUrl: 'templates/event_grid.html',
            controller: 'premium'
        })
        .when('/robo', {
            templateUrl: 'templates/event_grid.html',
            controller: 'robo'
        })
        .when('/bits', {
            templateUrl: 'templates/event_grid.html',
            controller: 'bits'
        })
        .when('/applied', {
            templateUrl: 'templates/event_grid.html',
            controller: 'applied'
        })
        .when('/management', {
            templateUrl: 'templates/event_grid.html',
            controller: 'management'
        })
        .when('/informals', {
            templateUrl: 'templates/event_grid.html',
            controller: 'informal'
        })
        .when('/builtrix', {
            templateUrl: 'templates/event_grid.html',
            controller: 'builtrix'
        })
        .when('/circuitrix', {
            templateUrl: 'templates/event_grid.html',
            controller: 'circuitrix'
        })
        .when('/online', {
            templateUrl: 'templates/event_grid.html',
            controller: 'online'
        })
        .when('/bioxyn', {
            templateUrl: 'templates/event_grid.html',
            controller: 'bioxyn'
        })
        .when('/workshops', {
            templateUrl: 'templates/event_grid.html',
            controller: 'workshops'
        })
        .when('/school', {
            templateUrl: 'templates/event_grid.html',
            controller: 'school'
        })

        .otherwise({
            redirectTo: '/premium'
        });
});