/**
 * Created by Shivam Mathur on 04-08-2015.
 */
var app = angular.module('events',['ngRoute']);

app.factory('event_details',function(){
    var factory = {};
    var premium=[];
    var robo = [];
    var bits = [];
    var applied = [];
    var management = [];
    var informal = [];
    var builtrix = [];
    var circuitrix = [];
    var online = [];
    var bioxyn = [];
    var workshops = [];
    var school = [];
    var count=0;
    factory.fetchPremium = function(){
        count=0;
        var list = document.getElementsByClassName('premium');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                premium[count] = {
                    id: 'p'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchRobo = function(){
        count=0;
        var list = document.getElementsByClassName('robomania');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                robo[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchBits = function(){
        count=0;
        var list = document.getElementsByClassName('bits');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                bits[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchApplied = function(){
        count=0;
        var list = document.getElementsByClassName('applied');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                applied[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchManagement = function(){
        count=0;
        var list = document.getElementsByClassName('management');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                management[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchInformal = function(){
        count=0;
        var list = document.getElementsByClassName('informal');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                informal[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchBuiltrix = function(){
        count=0;
        var list = document.getElementsByClassName('builtrix');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                builtrix[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchCircuitrix = function(){
        count=0;
        var list = document.getElementsByClassName('circuitrix');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                circuitrix[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchOnline = function(){
        count=0;
        var list = document.getElementsByClassName('online');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                online[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchBioxyn = function(){
        count=0;
        var list = document.getElementsByClassName('bioxyn');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                bioxyn[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchWorkshops = function(){
        count=0;
        var list = document.getElementsByClassName('workshops');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                workshops[count] = {
                    id: 'r'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };
    factory.fetchSchool = function(){
        count=0;
        var list = document.getElementsByClassName('school');
        for(x in  list){
            if(list[x].childNodes){
                var id= count+1;
                school[count] = {
                    id: 'p'+id,
                    name: list[x].childNodes[1].innerText,
                    Coordinator: list[x].childNodes[3].innerText,
                    Contact: list[x].childNodes[5].innerText,
                    poster: list[x].childNodes[7].innerText,
                    Description: list[x].childNodes[9].innerText,
                    Fee: list[x].childNodes[11].innerText
                }
            }
            count++;
        }
    };

    factory.getPremium = function(){ return premium; };
    factory.getRobo = function(){ return robo; };
    factory.getBits = function(){ return bits; };
    factory.getApplied = function(){ return applied; };
    factory.getManagement = function(){ return management; };
    factory.getInformal = function(){ return informal; };
    factory.getBuiltrix = function(){ return builtrix; };
    factory.getCircuitrix = function(){ return circuitrix; };
    factory.getOnline = function(){ return online; };
    factory.getBioxyn = function(){ return bioxyn; };
    factory.getWorkshops = function(){ return workshops; };
    factory.getSchool = function(){ return school; };

    return factory;
});


/**  controllers  */
var controllers={};
controllers.premium = function ($scope, event_details) {
    $scope.category = 'Premium';
    $scope.setup = function(){
        event_details.fetchPremium();
        $scope.data = event_details.getPremium();

    };
};
controllers.robo = function ($scope, event_details) {
    $scope.category = 'Robomania';
    $scope.setup = function(){
        event_details.fetchRobo();
        $scope.data = event_details.getRobo();
    };
};
controllers.bits = function ($scope, event_details) {
    $scope.category = 'Bits & Bytes';
    $scope.setup = function(){
        event_details.fetchBits();
        $scope.data = event_details.getBits();
    };
};
controllers.applied = function ($scope, event_details) {
    $scope.category = 'Applied';
    $scope.setup = function(){
        event_details.fetchApplied();
        $scope.data = event_details.getApplied();
    };
};
controllers.management = function ($scope, event_details) {
    $scope.category = 'Management';
    $scope.setup = function(){
        event_details.fetchManagement();
        $scope.data = event_details.getManagement();
    };
};
controllers.informal = function ($scope, event_details) {
    $scope.category = 'Informals';
    $scope.setup = function(){
        event_details.fetchInformal();
        $scope.data = event_details.getInformal();
    };
};
controllers.builtrix = function ($scope, event_details) {
    $scope.category = 'Builtrix';
    $scope.setup = function(){
        event_details.fetchBuiltrix();
        $scope.data = event_details.getBuiltrix();
    };
};
controllers.circuitrix = function ($scope, event_details) {
    $scope.category = 'Cicuitrix';
    $scope.setup = function(){
        event_details.fetchCircuitrix();
        $scope.data = event_details.getCircuitrix();
    };
};
controllers.online = function ($scope, event_details) {
    $scope.category = 'Online';
    $scope.setup = function(){
        event_details.fetchOnline();
        $scope.data = event_details.getOnline();
    };
};
controllers.bioxyn = function ($scope, event_details) {
    $scope.category = 'Bionyx';
    $scope.setup = function(){
        event_details.fetchBioxyn();
        $scope.data = event_details.getBioxyn();
    };
};
controllers.workshops = function ($scope, event_details) {
    $scope.category = 'Workshops';
    $scope.setup = function(){
        event_details.fetchWorkshops();
        $scope.data = event_details.getWorkshops();
    };
};
controllers.school = function ($scope, event_details) {
    $scope.category = 'School';
    $scope.setup = function(){
        event_details.fetchSchool();
        $scope.data = event_details.getSchool();
    };
};
app.controller(controllers);

var des =  "";