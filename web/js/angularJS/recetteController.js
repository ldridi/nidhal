/**
 * Created by lotfidev on 18/06/16.
 */


var app = angular.module('myApp',[])
    .config(function($interpolateProvider){
    $interpolateProvider.startSymbol('#').endSymbol('#');




})
    .directive('loading', function () {
        return {
            restrict: 'E',
            replace:true,
            template: '<div class="loading"><img src="http://www.nasa.gov/multimedia/videogallery/ajax-loader.gif" width="20" height="20" />LOADING...</div>',
            link: function (scope, element, attr) {
                scope.$watch('loading', function (val) {
                    if (val)
                        $(element).show();
                    else
                        $(element).hide();
                });
            }
        }
    });
app.controller('recetteController', function($scope,$http) {



    $scope.recettes=[

    ];

    $scope.prixs=[

    ];

    $scope.nationalites=[

    ];




    /**/

    // toutes les recttes au chagement de la page

    $http.post(Routing.generate('recetteJSON'))
        .then(function(response) {


            $.each(response.data, function (index, item) {


                $scope.recettes.push({
                    id:item.id,
                    titre:item.titre,
                    image:item.image,
                    cuisson:item.cuisson,
                    preparation:item.preparation,
                    prix:item.prix,
                    nationalite:item.nationalite

                });


            });
        });










    $http.post(Routing.generate('prixJSON'))
        .then(function(response) {


            $.each(response.data, function (index, item) {


                $scope.prixs.push({
                    id:item.id,
                    prix:item.prix,

                });


            });
        });
    
    
    
    // afficher toutes les nationalites de la base (json)
    
    $http.post(Routing.generate('nationaliteJSON'))
        .then(function(response) {



            $.each(response.data, function (index, item) {


                $scope.nationalites.push({
                    id:item.id,
                    nationalite:item.nationalite,

                });


            });
        });
    
    
    
    


        // affiche recette par nationalite ==> id

        $scope.getRecetteByNationalite = function(nationalite){

            $scope.loading = true;
            $http.post(Routing.generate('recetteNationaliteJSON', { nationalite: nationalite }))
                .then(function(response) {


                    $.each(response.data, function (index, item) {

                        console.log(response.data);
                        $scope.recettes.push({
                            id:item.id,
                            titre:item.titre,
                            image:item.image,
                            cuisson:item.cuisson,
                            preparation:item.preparation,
                            prix:item.prix,
                            nationalite:item.nationalite

                        });


                    });
                    $scope.loading = false;


                });
    }




});
