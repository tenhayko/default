'use strict';
var app = angular.module('app',[
    'ui.router',
    'ui.tinymce',
    'app.admin',
]);
app.config(['$stateProvider','$urlRouterProvider',function($stateProvider,$urlRouterProvider) {
	$stateProvider	
	.state('erro',{
		url:'/not-found',
		template:'<strong>Not found <br> 404!</strong>'
	});
	$urlRouterProvider.otherwise('/book');
}]);
app.directive('pagination', function(){
    return {
  restrict: 'E',
  template: '<div class="box-footer clearfix">'+
            '<ul class="pagination pagination-sm no-margin pull-right">'+
            '<li ng-show="currentPage > 1"><a href="javascript:void(0)" ng-click="getItems(1)">«</a></li>'+
            '<li ng-show="currentPage > 1"><a href="javascript:void(0)" ng-click="getItems(currentPage-1)">‹ Prev</a></li>'+
            '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getItems(i)">{{ i }}</a>'+
            '</li>'+
            '<li ng-show="currentPage < totalPages"><a href="javascript:void(0)" ng-click="getItems(currentPage+1)">Next ›</a></li>'+
            '<li ng-show="currentPage < totalPages"><a href="javascript:void(0)" ng-click="getItems(totalPages)">»</a></li>'+
            '</ul>'+
            '</div>'  
    };
}).run(function($rootScope, Notification) {
    $rootScope.goBack = function() {
        window.history.back();
    };

    $rootScope.exportExcel = function() {
	$(".table-export").table2excel({
	    exclude: ".noExl",
	    name: "Excel Document Name",
	    filename: "baocao.xls",
	    fileext: ".xls",
	    exclude_img: true,
	    exclude_links: true,
	    exclude_inputs: true
	});	
    };
    
}).directive('passwordVerify', passwordVerify)
.directive('fileModel', ['$parse', function ($parse) {
    return {
       restrict: 'A',
       link: function(scope, element, attrs) {
          var model = $parse(attrs.fileModel);
          var modelSetter = model.assign;
          
          element.bind('change', function(){
             scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
             });
          });
       }
    };
 }]).directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter);
                });
                event.preventDefault();
            }
        });
    };
}).controller('SearchGloballoController',function($rootScope,$scope,$http,Notification){
   $scope.userSearch = {};
    $rootScope.searchUser = function(){
      if ($rootScope.phoneNumber) {
        $('#searchUserResul').removeClass('user-sidebar-open');
        var urlapi = API+'customer/search/'+$rootScope.phoneNumber;
        $http({
            method  : 'GET',
            url   : urlapi,
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            if (response.data.status) {
              $('#userinfo').addClass('active');
              $('#user-sidebar-home-tab').addClass('active');
              $('#useradd').removeClass('active');
              $('#user-sidebar-settings-tab').removeClass('active');
              $scope.userSearch = response.data.data;
            }else{
              $('#useradd').addClass('active');
              $('#user-sidebar-settings-tab').addClass('active');
              $('#userinfo').removeClass('active');
              $('#user-sidebar-home-tab').removeClass('active');
              $scope.userSearch = response.data.data;
            }
            $('#searchUserResul').addClass('user-sidebar-open');
            // Notification.success({message: 'Thêm thành công', delay: 5000});
        },function (error){
            Notification.error({message: 'Có lỗi xảy ra', delay: 5000});
        });
        
      }
    }
    $scope.saveUser = function(){
      var url = API+'customer/add';
      var data = $.param($scope.userSearch);
      console.log(data);
      $http({
          method  : 'POST',
          url   : url,
          data  : data,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function (response) {
          $('#userinfo').addClass('active');
          $('#user-sidebar-home-tab').addClass('active');
          $('#useradd').removeClass('active');
          $('#user-sidebar-settings-tab').removeClass('active');
          Notification.success({message: 'Thêm thành công', delay: 5000});
      },function (error){
          Notification.error({message: 'Có lỗi xảy ra', delay: 5000});
          if (error.status == 422){
            $scope.errors = error.data;
          }
      });
    }
});

function passwordVerify() {
    return {
      restrict: 'A', // only activate on element attribute
      require: '?ngModel', // get a hold of NgModelController
      link: function(scope, elem, attrs, ngModel) {
        if (!ngModel) return; // do nothing if no ng-model

        // watch own value and re-validate on change
        scope.$watch(attrs.ngModel, function() {
          validate();
        });

        // observe the other value and re-validate on change
        attrs.$observe('passwordVerify', function(val) {
          validate();
        });

        var validate = function() {
          // values
          var val1 = ngModel.$viewValue;
          var val2 = attrs.passwordVerify;

          // set validity
          ngModel.$setValidity('passwordVerify', val1 === val2);
        };
      }
    }
}
