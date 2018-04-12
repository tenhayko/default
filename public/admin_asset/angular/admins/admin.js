'use strict';

angular.module('app.admin', ['ui.router', 'ui-notification'])
    .config(['$stateProvider',function($stateProvider) {
	$stateProvider
	    .state('admin', {
		abstract: true,     
		views:{
		    '':{
			templateUrl: 'admin_asset/angular/admins/admin.html'
		    },
		}		
	    })
	    .state('admin.list',{
			url:'/admin',
			views:{
			    'admin-list': {
				templateUrl: 'admin_asset/angular/admins/admin-list.html',
				controller: 'AdminListController'
			    }
			}
	    })
	    .state('admin.profile',{
			url:'/profile',
			views:{
			    'admin-profile': {
				templateUrl: 'admin_asset/angular/admins/admin-profile.html',
				controller: 'AdminProfileController'
			    }
			}
	    })	
	    .state('admin.details', {
			url: '/admin/:id',
			views:{
			    'admin-detail': {
				templateUrl: 'admin_asset/angular/admins/admin-details.html',
				controller: 'AdminDetailsController'
			    }
			},
			params:{
			    id: {value: null}
			}	
	    })	
    }])
    .controller('AdminProfileController', ['$scope', '$rootScope', '$http', 'Notification', function($scope, $rootScope, $http, Notification){
    	var urlapi = API+'admin'+'/profile';
		$http({
			method: 'get', 
			url: urlapi
	    }).then(function (response) {
			$scope.info     = response.data.info;
	    },function (error){
			console.log(error, 'can not get data.');
	    });
		
	    $scope.changeAvatar = function()
	    {
	    	$('#modalForm').modal('show');
	    }
	    $scope.uploadFile = function(id){

           var file = $scope.myFile;
           
           // console.log('file is ' );
           // console.dir(file);
           var uploadUrl = API+'admin'+'/upload';
           var fd = new FormData();
           fd.append('file', file);
           fd.append('user', id);
        	$http({
			    method 	: 'post',
			    url		: uploadUrl,
			    data 	: fd,
			    headers: {'Content-Type': undefined},
			    transformRequest: angular.identity
			}).then(function (response) {
			    Notification.success({message: 'Sửa thành công', delay: 5000});
			    $scope.info     = response.data.info;
			    $('#modalForm').modal('hide');
			},function (error){
			    Notification.error({message: 'Có lỗi xảy ra', delay: 5000});
			    $('#modalForm').modal('hide');
			});
        };
    }])
    .controller('AdminListController', ['$scope', '$rootScope', '$http', 'Notification', function($scope, $rootScope, $http, Notification){
		$rootScope.title = 'Danh sách Admin';
		var prefix = 'admin';
		$scope.agencies = [];
		$scope.totalPages = 0;
		$scope.currentPage = 1;
		$scope.range = [];

		$scope.getItems = function (pageNumber,search) {
			
		    if (pageNumber === undefined) {
				pageNumber = '1';
		    }
		    if (search === undefined) {
	      		var urlapi = API+prefix+'/list'+ '?page=' + pageNumber;
		    }else{
	      		var urlapi = API+prefix+'/list'+ '?page=' + pageNumber + '&search=' + search;
		    }
		    $http({
				method: 'get', 
				url: urlapi
		    }).then(function (response) {
				$scope.admins     = response.data.data;
				$scope.totalPages   = response.data.last_page;
				$scope.currentPage  = response.data.current_page;
				var pages = [];
				for (var i = 1; i <= response.data.last_page; i++) {
				    pages.push(i);
				}
				$scope.range = pages;
		    },function (error){
				console.log(error, 'can not get data.');
		    });
		};

	$scope.modal = function(state,id){
	    $scope.state = state;
	    switch(state){
		    case 'add':
				$scope.frmTitle = 'Thêm Thành Viên';
				delete $scope.admin;
				$scope.frmAdmin.$setPristine();
		        $scope.frmAdmin.$setUntouched();
		        $scope.frmAdmin.$submitted = false;
				break;
		    case 'edit':
				// chua su ly
				$scope.frmTitle = 'Sửa Thành Viên';
				$scope.id = id;
				$http({
				    method: 'get', 
				    url: API+prefix+'/edit/'+id
				}).then(function (response) {
				    // console.log(response.data);
				    $scope.admin = response.data;
				},function (error){
				    console.log(error, 'can not get data.');
				});
				break;
		    default :
				$scope.frmTitle = 'Không biết';
				break;
	    }
	    // console.log($scope.frmTitle);
	    $('#modalForm').modal('show');
	}
	$scope.save = function(state,id){
	    if (state == 'add') {
		var url = API+prefix+'/add';
		var data = $.param($scope.admin);
		$http({
		    method 	: 'POST',
		    url		: url,
		    data 	: data,
		    headers	: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function (response) {
		    $scope.getItems();
		    // alert('Thêm thành công');
		    Notification.success({message: 'Thêm thành công', delay: 5000});
		    $('#modalForm').modal('hide');
		    // location.reload()
		},function (error){
		    console.log(error, 'can not get data.');
		    if (error.status == 422){
				$scope.errors = error.data;
		    }
		    else {
				alert('Xảy ra lỗi');
		    }
		});
	    }
	    if (state == 'edit') {
		// chua su ly
		var url = API+prefix+'/edit/'+id;
		var data = $.param($scope.admin);
		$http({
		    method 	: 'POST',
		    url		: url,
		    data 	: data,
		    headers	: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function (response) {
		    // alert('Sửa thành công');
		    Notification.success({message: 'Sửa thành công', delay: 5000});
		    $scope.getItems($scope.currentPage);
		    $('#modalForm').modal('hide');
		},function (error){
		    console.log(error.data, 'can not get data.');
		    if (error.status == 422){
				$scope.errors = error.data;
		    }
		    else {
				alert('Xảy ra lỗi');
		    }
		});
	    }
	    console.log(state);
	}

	$scope.confirmDelete = function(id){
	    // chua su ly
	    var isConfirmDelete = confirm('Bạn có chắc chắn muốn xoa?');
	    if (isConfirmDelete) {
			$http({
			    method: 'post', 
			    url: API+prefix+'/delete/'+id
			}).then(function (response) {
			    // console.log(response);
			    // alert(response.data);
			    Notification.success({message: response.data, delay: 5000});
			    $scope.getItems($scope.currentPage);
			},function (error){
			    console.log(error, 'can not get data.');
			});
	    }else{
		return false;
	    }
	}
	
    }])
    .controller('AdminDetailsController', ['$scope', '$rootScope', '$stateParams', '$http', 'Notification', function($scope, $rootScope, $stateParams, $http, Notification){

		var urlapi = API+'admin'+'/info/'+ $stateParams.id;
		$http({
			method: 'get', 
			url: urlapi
	    }).then(function (response) {
			$scope.info     = response.data.info;
	    },function (error){
			console.log(error, 'can not get data.');
	    });

		$scope.getItems = function (pageNumber,search) {

		    if (pageNumber === undefined) {
			pageNumber = '1';
		    }
		    if (search === undefined) {
	      		var urlapi = API+'admin/history/'+$stateParams.id+'?page=' + pageNumber;
		    }else{
	      		var urlapi = API+'admin/history/'+$stateParams.id+'?page=' + pageNumber + '&search=' + search;
		    }
		    $http({
			method: 'get', 
			url: urlapi
		    }).then(function (response) {
			$scope.history     = response.data.data;
			$scope.totalPages   = response.data.last_page;
			$scope.currentPage  = response.data.current_page;
			var pages = [];
			for (var i = 1; i <= response.data.last_page; i++) {
			    pages.push(i);
			}
			$scope.range = pages;
		    },function (error){
			console.log(error, 'can not get data.');
		    });
		};

	    $scope.changeAvatar = function()
	    {
	    	$('#modalForm').modal('show');
	    }
	    $scope.uploadFile = function(id){

           var file = $scope.myFile;
           
           console.log('file is ' );
           console.dir(file);
           var uploadUrl = API+'admin'+'/upload';
           var fd = new FormData();
           fd.append('file', file);
           fd.append('user', id);
        	$http({
			    method 	: 'post',
			    url		: uploadUrl,
			    data 	: fd,
			    headers: {'Content-Type': undefined},
			    transformRequest: angular.identity
			}).then(function (response) {
			    Notification.success({message: 'Sửa thành công', delay: 5000});
			    $scope.info     = response.data.info;
			    $('#modalForm').modal('hide');
			},function (error){
			    Notification.error({message: 'Có lỗi xảy ra', delay: 5000});
			    $('#modalForm').modal('hide');
			});
        };
    }]);
