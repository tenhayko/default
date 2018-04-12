 <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>


  <aside class="user-sidebar user-sidebar-dark custom-tab" id="searchUserResul" ng-controller="SearchGloballoController"c>
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li id="userinfo">  
          <a href="#user-sidebar-home-tab" data-toggle="tab"><i class="fa fa-user-o" aria-hidden="true"></i></a>
      </li>

      <li id="useradd">
          <a href="#user-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
      </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      {{--  --}}
      <div class="tab-pane" id="user-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Thông tin khách hàng</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading" ng-bind="userSearch.name"></h4>

                <p>Phone <span ng-bind="userSearch.phone"></span></p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
      </div>
      {{--  --}}
       <div class="tab-pane" id="user-sidebar-settings-tab">
        <form name="frmAddUser">
          <h3 class="control-sidebar-heading">Thêm khách hàng</h3>
          
          <div class="form-group" ng-class="{'has-error': errors.title != undefined || (frmAddUser.title.$invalid && frmAddUser.title.$touched)}">
            <label for="inputEmail3" class="control-label">Danh xưng</label>
            <div>
                <select class="form-control" id="title" name="title" ng-model="userSearch.title" ng-required="true">
                  <option value="">Chọn danh xưng</option>
                  <option value="Ông">Ông</option>
                  <option value="Bà">Bà</option>
                  <option value="Anh">Anh</option>
                  <option value="Chị">Chị</option>
                </select>
                <div ng-show="frmAddUser.$submitted || frmAddUser.title.$touched">
                  <span class="help-block" ng-show="frmAddUser.title.$error.required">Vui lòng chọn danh xưng</span>
                </div>
            </div>
          </div>

          <div class="form-group" ng-class="{'has-error': frmAddUser.name.$invalid && frmAddUser.name.$touched}">
            <label for="inputEmail3" class="control-label">Họ và Tên</label>
            <div>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên" ng-model="userSearch.name" ng-required="true" />
                <div ng-show="frmAddUser.$submitted || frmAddUser.name.$touched">
                  <span class="help-block" ng-show="frmAddUser.name.$error.required">Vui lòng nhập họ và tên</span>
                </div>
            </div>
          </div>

          <div class="form-group" ng-class="{'has-error': errors.phone != undefined || (frmAddUser.phone.$invalid && frmAddUser.phone.$touched)}">
            <label for="inputEmail3" class="control-label">Số điện thoại</label>
            <div>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" ng-model="userSearch.phone" ng-required="true" ng-pattern="/^[0-9]{10,11}$/" />
                <div ng-show="frmAddUser.$submitted || frmAddUser.phone.$touched">
                  <span id="helpBlock2" class="help-block" ng-show="frmAddUser.phone.$error.required">Vui lòng nhập số điện thoại</span>
                  <span class="help-block" ng-show="frmAddUser.phone.$error.pattern">Số điện thoại không đúng định dạng</span>
                </div>
                <div ng-show="errors.phone != undefined">
                  <span class="help-block" ng-bind="errors.phone[0]"></span>
                </div>
            </div>
          </div>

          <div class="form-group" ng-class="{'has-error': frmAddUser.password.$invalid && frmAddUser.password.$touched}">
            <label for="password" class="control-label">Mật khẩu</label>
            <div>
                <input class="form-control" ng-model="userSearch.password" type="password" name="password" placeholder="Password">
            </div>
          </div>

          <div class="form-group" ng-class="{'has-error': frmAddUser.code.$invalid && frmAddUser.code.$touched}">
            <label for="inputEmail3" class="control-label">Mã giới thiệu</label>
            <div>
                <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã giới thiệu" ng-model="userSearch.code"/>
            </div>
          </div>
          <div>
            <button type="button" class="btn btn-primary btn-block" ng-disabled="frmAddUser.$invalid" ng-click="saveUser()">Thêm</button>
          </div>
          
          <!-- /.form-group -->

        </form>
        <!-- /.control-sidebar-menu -->
      </div>
    </div>
  </aside>