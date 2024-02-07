/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
var app = angular.module('UserProfileApp', []);

app.controller('ProfileController', function($scope, $http) {
    // Get the username from the URL query parameter
    var urlParams = new URLSearchParams(window.location.search);
    var username = urlParams.get('username');

    $http.get('profile.php?username=' + username)
        .then(function(response) {
            $scope.user = response.data;
        })
        .catch(function(error) {
            $scope.error = "Error fetching user profile data.";
            console.error(error);
        });
});



