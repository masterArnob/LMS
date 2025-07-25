 <h4 class="subheader">Business settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="{{ route('admin.general-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.general-settings.index') ? 'active' : '' }}">General Settings</a>
                      <a href="{{ route('admin.logo-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.logo-settings.index') ? 'active' : '' }}">Logo & Favicon Settings</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Commission Settings</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">SMTP Settings</a>
                    </div>