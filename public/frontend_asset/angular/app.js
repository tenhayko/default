'use strict';
var app = angular.module('app', [
    'angular-loading-bar',
    'ui-notification',
    'pascalprecht.translate',
    'app.lag'
    ], function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
}).run(function($http, $rootScope){

}).constant('API', "http://embracetransfers.com/").directive('googlePlace', directiveFunction);

// google
directiveFunction.$inject = ['$rootScope'];

function directiveFunction($rootScope) {
  return {
    require: 'ngModel',
    scope: {
      ngModel: '=',
      details: '=?'
    },
    link: function(scope, element, attrs, model) {
        var options = {
          componentRestrictions: {country: 'vn'}
        };
      scope.gPlace = new google.maps.places.Autocomplete(element[0], options);

      google.maps.event.addListener(scope.gPlace, 'place_changed', function() {
        scope.$apply(function() {
          scope.details = scope.gPlace.getPlace();
          console.log(scope.details);
          model.$setViewValue(element.val());
          $rootScope.$broadcast('place_changed', scope.details);
        });
      });
    }
  };
}

// end 
app.controller('MainController', function($scope, $rootScope, $http, Notification, $sce, API, $translate, $window, $timeout){
    var currentDate = new Date();
    var currentMinute = currentDate.getMinutes();
    var currentHours = currentDate.getHours();
    currentMinute = parseInt(currentMinute/5)*5;
        
    if (currentMinute == 0 || currentMinute==5) {
        currentMinute = '0'+currentMinute.toString();
    }else{
        currentMinute = currentMinute.toString();
    }
    if (currentHours < 10 ) {
        currentHours = '0'+currentHours.toString();
    }else{
        currentHours = currentHours.toString();
    }
    $scope.oneWay = {};
    $scope.twoWay = {};
    $scope.button = {};

    $scope.oneWay.time = currentHours;
    $scope.oneWay.time_minute = currentMinute;

    $scope.twoWay.don_time = currentHours;
    $scope.twoWay.don_time_minute = currentMinute;

    $scope.twoWay.tien_time = currentHours;
    $scope.twoWay.tien_time_minute = currentMinute;

    $scope.disableMan = 0;
    $scope.oneWay.typeOfTrip = "1";
    $scope.twoWay.typeOfTrip = "2";
    $scope.choose = false;
    $scope.button.disabled = false;
    var book;

    var lag = localStorage.getItem("lag");
    if (lag) {
        $translate.use(lag);
        localStorage.setItem("lag", lag);
    }else{
        localStorage.setItem("lag", 'en');
    }
    $scope.changDis = function(blon)
    {
        $scope.disableMan = blon;
    }
    $scope.showFlag = function()
    {
        $scope.isShowFlag = !$scope.isShowFlag;
    }
    $scope.setFlag = function(flag)
    {
        // $scope.perInfo.phone = flag.prefix;
        // $scope.perInfo.flag = flag.prefix;
        $scope.isShowFlag = 0;
        $scope.perInfo.currenFlag = flag;
        $('#perInfo_phone').focus();

    }
    $scope.getFlag = function()
    {
        var perInfox = localStorage.getItem("perInfo");
        var setValx = true;
        if (perInfox) {
            setValx = false;
        }
        $http({
            method: 'get', 
            url: API+'phone-code/get'
        }).then(function (response) {
            $scope.flagList = response.data;
            if (setValx) {
                $scope.perInfo.currenFlag = $scope.flagList[0];
                // $scope.perInfo.phone = $scope.flagList[0].prefix;
                // $scope.perInfo.flag = $scope.flagList[0].prefix;
            }
        },function (error){
            console.log(error, 'can not get data.');
        });
    }
    $scope.Search = function(way){
        var lagBook = localStorage.getItem("lag");
        if (way == 1) {
            if (($scope.oneWay.typeOfTrip == "1" && $scope.oneWay.date && $scope.oneWay.don_den && $scope.oneWay.don_di && $scope.oneWay.time) || 
                ($scope.oneWay.typeOfTrip == "0" && $scope.oneWay.date && $scope.oneWay.tien_den && $scope.oneWay.tien_di && $scope.oneWay.time)) {
                $scope.oneWay.time = $scope.oneWay.time+':'+$scope.oneWay.time_minute;
                book = $scope.oneWay;
                $scope.waySelect = $scope.oneWay.typeOfTrip;
            }else{
                if (lagBook == 'en') {
                    Notification.error({message: 'Please enter enough information', delay: 5000});
                }else{
                    Notification.error({message: 'Vui lòng nhập đủ thông tin', delay: 5000});
                }
                book = false;
            }
        }else{
            if ($scope.twoWay.don_date && $scope.twoWay.don_den && $scope.twoWay.don_di && $scope.twoWay.don_time && $scope.twoWay.tien_date 
                && $scope.twoWay.tien_den && $scope.twoWay.tien_di && $scope.twoWay.tien_time) {
                $scope.twoWay.don_time = $scope.twoWay.don_time+':'+$scope.twoWay.don_time_minute;
                $scope.twoWay.tien_time = $scope.twoWay.tien_time+':'+$scope.twoWay.tien_time_minute;
                book = $scope.twoWay;
                $scope.waySelect = 2;
            }else{
                if (lagBook == 'en') {
                    Notification.error({message: 'Please enter enough information', delay: 5000});
                }else{
                    Notification.error({message: 'Vui lòng nhập đủ thông tin', delay: 5000});
                }
                book = false;
            }
        }
        if (book) {
            localStorage.setItem("book", JSON.stringify(book));
            $scope.choose = true;
        }
        
    }

    $scope.getCars = function(){
        var lag_get = localStorage.getItem("lag");
        $http({
            method: 'get', 
            url: API+'cars/'+lag_get
        }).then(function (response) {
            $scope.cars = response.data;
        },function (error){
            console.log(error, 'can not get data.');
        });
    }    
    $scope.getPosts = function(){
        var lag_get = localStorage.getItem("lag");
        $http({
            method: 'get', 
            url: API+'posts/'+lag_get
        }).then(function (response) {
            $scope.posts = response.data;
        },function (error){
            console.log(error, 'can not get data.');
        });
    }

    $scope.getHelp = function(){
        var lag_get = localStorage.getItem("lag");
        $http({
            method: 'get', 
            url: API+'help/get/'+lag_get
        }).then(function (response) {
            $scope.help = response.data;
        },function (error){
            console.log(error, 'can not get data.');
        });
    }    
    $scope.getTerm = function(){
        var lag_get = localStorage.getItem("lag");
        $http({
            method: 'get', 
            url: API+'term/get/'+lag_get
        }).then(function (response) {
            $scope.helpx = response.data;
        },function (error){
            console.log(error, 'can not get data.');
        });
    }

    $scope.init = function(){
        $scope.getCars();
        $scope.getPosts();
        $scope.getFooter();
    }

    $scope.rand = function(i) {
        return i + Math.random();
    }

    $scope.backForm = function(){
        $scope.choose = false;
    }

    $scope.trustAsHtml = function(html) {
      return $sce.trustAsHtml(html);
    }

    // lag===================================================

    $scope.changeLanguage = function(){
      var lagc = localStorage.getItem("lag");
      if (lagc=='en') {
        var key = 'vi';
        Notification.success({message: 'Thay đổi thành công', delay: 2000});
      }else{
        var key = 'en';
        Notification.success({message: 'Successful change', delay: 2000});
      }
      localStorage.setItem("lag", key);
      $translate.use(key);
      $scope.getCars();
      $scope.getPosts();
      $scope.getHelp();
      $scope.getTerm();
    };

    //book
    $scope.selectThis = function(idCar){
        $scope.button.disabled = true;
        var get_book_info = localStorage.getItem("book");
        var lag = localStorage.getItem("lag");
        $scope.isLoadding = true;
        if (get_book_info) {
            get_book_info = JSON.parse(get_book_info);
            get_book_info.idCar = idCar;
            var data = $.param(get_book_info);
            $http({
                method : "POST",
                url : API+'info',
                data    : data,
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySuccess(response) {
                $window.location.href = '/info';
                $scope.button.disabled = false;
                $scope.isLoadding = false;
            }, function myError(response) {
                $scope.button.disabled = false;
                if (lag=='vi') {
                    Notification.error({message: 'Đã xảy ra lỗi. Vui lòng thử lại.', delay: 2000});
                }else{
                    Notification.error({message: 'An error occurred. Please try again.', delay: 2000});
                }
                $scope.choose = false;
                $scope.isLoadding = false;
            });
        }else{
            $scope.button.disabled = false;
            $scope.choose = false;
            $scope.isLoadding = false;
        }
    }
    $scope.goHome = function(){
        $window.location.href = '/';
    }
    //footer
    $scope.getFooter = function()
    {
        $http({
            method: 'get', 
            url: API+'contact'
        }).then(function (response) {
            $scope.contact = response.data;
        },function (error){
            console.log(error, 'can not get data.');
        });
    }
    //=========================info
    $scope.activeMenu = 1;
    $scope.air = {};
    $scope.changeActive = function(key)
    {
        $scope.activeMenu = key;
    }
    $scope.getAirline = function()
    {
        var air = localStorage.getItem("air");
        var perInfo = localStorage.getItem("perInfo");
        var setVal = true;
        if (air) {
            $scope.air =  JSON.parse(air);
            $scope.activeMenu = 2;
            setVal = false;
        }
        if (perInfo && air) {
            $scope.perInfo =  JSON.parse(perInfo);
            $scope.activeMenu = 3;
        }
        $http({
            method: 'get', 
            url: API+'airline'
        }).then(function (response) {
            $scope.airlines = response.data;
            if (setVal) {
                $scope.air.air = $scope.airlines[0];
            }
        },function (error){
            console.log(error, 'can not get data.');
        });
    }
    $scope.submitAir = function(key)
    {
        if ($scope.frmAirline.$valid) {
            $scope.activeMenu = key;
            // localStorage.setItem("air", JSON.stringify($scope.air));
        }
    }
    $scope.submitPerInfo = function(key)
    {
        if ($scope.frmPerInfo.$valid) {
            // localStorage.setItem("perInfo", JSON.stringify($scope.perInfo));
            $scope.activeMenu = key;
        }
        
    }
    $scope.doneBankpay = function()
    {
        if ($scope.frmAirline.$valid && $scope.frmPerInfo.$valid) {
            var lag = localStorage.getItem("lag");
            if ($scope.perInfo.language != undefined) {
                $scope.perInfo.lag = '';
                if ($scope.perInfo.language.en != undefined) {
                    $scope.perInfo.lag = 'English';
                }
                if ($scope.perInfo.language.vi != undefined) {
                    $scope.perInfo.lag += ' Vietnamese';
                }
                if ($scope.perInfo.language.other != undefined) {
                    $scope.perInfo.lag += $scope.perInfo.language.other;
                }
            }
            $scope.perInfo.phone = $scope.perInfo.currenFlag.prefix+$scope.perInfo.phone;
            var postData = {
                air : $scope.air,
                perInfo : $scope.perInfo,
                pay_type: $scope.pay.type
            }
            var data = $.param(postData);
            $scope.isLoadding = true;
            $http({
                method : "POST",
                url : API+'book-pay',
                data    : data,
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySuccess(response) {
                $window.location.href = response.data.url;
            }, function myError(response) {
                $scope.isLoadding = false;
                if (lag=='vi') {
                    Notification.error({message: 'Đã xảy ra lỗi. Vui lòng thử lại.', delay: 2000});
                }else{
                    Notification.error({message: 'An error occurred. Please try again.', delay: 2000});
                }

            });
        }else{
            $scope.activeMenu = 1;
        }
    }
    $scope.doneCashpay = function()
    {
        if ($scope.frmAirline.$valid && $scope.frmPerInfo.$valid) {
            var lag = localStorage.getItem("lag");
            if ($scope.perInfo.language != undefined) {
                $scope.perInfo.lag = '';
                if ($scope.perInfo.language.en != undefined) {
                    $scope.perInfo.lag = 'English';
                }
                if ($scope.perInfo.language.vi != undefined) {
                    $scope.perInfo.lag += ' Vietnamese';
                }
                if ($scope.perInfo.language.other != undefined) {
                    $scope.perInfo.lag += $scope.perInfo.language.other;
                }
            }
            $scope.perInfo.phone = $scope.perInfo.currenFlag.prefix+$scope.perInfo.phone;
            var postData = {
                air : $scope.air,
                perInfo : $scope.perInfo
            }
            var data = $.param(postData);
            $scope.isLoadding = true;
            $http({
                method : "POST",
                url : API+'book',
                data    : data,
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySuccess(response) {
                localStorage.removeItem('air');
                localStorage.removeItem('perInfo');
                $scope.isLoadding = false;
                $window.location.href = '/thank';
            }, function myError(response) {
                $scope.isLoadding = false;
                if (lag=='vi') {
                    Notification.error({message: 'Đã xảy ra lỗi. Vui lòng thử lại.', delay: 2000});
                }else{
                    Notification.error({message: 'An error occurred. Please try again.', delay: 2000});
                }

            });
        }else{
            $scope.activeMenu = 1;
        }
    }
    $scope.unsetLocal = function(){
        localStorage.removeItem('air');
        localStorage.removeItem('perInfo');
        // $timeout( function(){
        //     $scope.goHome();
        // }, 3000 );
    }
});
