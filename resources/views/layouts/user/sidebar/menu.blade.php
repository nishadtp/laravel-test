<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                @lang('menu.product')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link">
                  &nbsp;
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.all_products')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('products.create') }}" class="nav-link">
                  &nbsp;
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.new_product')</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>


</div>