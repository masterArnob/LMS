 <h4 class="subheader">Business settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="{{ route('admin.general-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ sidebarItemActive(['admin.general-settings.*']) }}">General Settings</a>
                      <a href="{{ route('admin.logo-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ sidebarItemActive(['admin.logo-settings.*']) }}">Logo & Favicon Settings</a>
                      <a href="{{ route('admin.comission-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ sidebarItemActive(['admin.comission-settings.*']) }}">Commission Settings</a>
                      <a href="{{ route('admin.smtp-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ sidebarItemActive(['admin.smtp-settings.*']) }}">SMTP Settings</a>
                    </div>