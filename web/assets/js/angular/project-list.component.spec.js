'use strict';

describe('projectList', function () {

    // Load the module that contains the `phoneList` component before each test
    beforeEach(module('projectApp'));

    // Test the controller
    describe('ProjectListController', function () {
        var $httpBackend, ctrl;

        // The injector ignores leading and trailing underscores here (i.e. _$httpBackend_).
        // This allows us to inject a service and assign it to a variable with the same name
        // as the service while avoiding a name conflict.
        beforeEach(inject(function ($componentController, _$httpBackend_) {
            $httpBackend = _$httpBackend_;
            $httpBackend.expectGET('/context.html/testajax')
                .respond([
                    {
                        "name": "A kid game !",
                        "description": "Yeah. Nothing less. Still dunno the platform tho."
                    }, {
                        "name": "A crazy api with java for message reception from erlang.",
                        "description": "Don't ask for a description man, i don't know either."
                    }
                ]);

            ctrl = $componentController('projectList');
        }));

        it('should create a `projects` property with 2 projects fetched with `$http`', function () {
            expect(ctrl.projects).toBeUndefined();

            $httpBackend.flush();
            expect(ctrl.projects).toEqual([
                {
                    "name": "A kid game !",
                    "description": "Yeah. Nothing less. Still dunno the platform tho."
                }, {
                    "name": "A crazy api with java for message reception from erlang.",
                    "description": "Don't ask for a description man, i don't know either."
                }
            ]);
            expect(ctrl.projects.length).toBe(2);
        });

        /*it('should create a `projects` list with a length of 2', function () {
            expect(ctrl.projects.length).toBe(2);
        });*/


    });

});